<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformasiDesign6FormRequest;
use App\Models\InformasiDesign6;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiDesign6Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = InformasiDesign6::orderBy('id', 'desc')->with(['KontenDesign6', 'weddingDesign6'])->paginate(10);
        return view('admin-design6.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InformasiDesign6FormRequest $request)
    {
        $data = $request->all();

        $currentDate = date('dmY'); // Mengambil tanggal dengan format Ymd
        $latestWeddingDesign6 = InformasiDesign6::orderBy('id', 'desc')->first(); // Mengambil data seserahan terakhir

        // Menentukan urutan ID Seserahan
        if ($latestWeddingDesign6) {
            $lastId = intval(substr($latestWeddingDesign6->id_weddingdesign6, -6)); // Mengambil 6 digit terakhir dari id_weddingdesign6
            $newIdNumber = $lastId + 1; // Menambah 1 dari id terakhir
        } else {
            $newIdNumber = 1; // Jika belum ada data, mulai dari 1
        }

        $idWeddingDesign6 = 'PDT-WDDS6-' . $currentDate . '-' . sprintf('%06d', $newIdNumber); // Format PDT-SSH-Ymd0001

        $data['id_weddingdesign6'] = $idWeddingDesign6;

        InformasiDesign6::create($data);

        return redirect()->route('wedding-design6.index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InformasiDesign6FormRequest $request, string $id)
    {
        $undangan = InformasiDesign6::find($id);

        if (!$undangan) {
            return redirect()->route('wedding-design6.index')->with('error', 'Data undangan tidak ditemukan.');
        }

        $undangan->update($request->all());

        return redirect()->route('wedding-design6.index')->with('success', 'Data undangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = InformasiDesign6::with(['KontenDesign6', 'PerjalananCintaDesign6'])->find($id);

        // Hapus semua file pada KontenDesign6
        foreach ($data->KontenDesign6 as $weddingDesign) {
            if ($weddingDesign->banner_img) {
                Storage::delete($weddingDesign->banner_img);
            }

            if ($weddingDesign->foto_prewedding) {
                Storage::delete($weddingDesign->foto_prewedding);
            }

            if ($weddingDesign->foto_mempelai_laki) {
                Storage::delete($weddingDesign->foto_mempelai_laki);
            }

            if ($weddingDesign->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign->foto_mempelai_perempuan);
            }

            if ($weddingDesign->music) {
                Storage::delete($weddingDesign->music);
            }


            if ($weddingDesign->akad_img) {
                Storage::delete($weddingDesign->akad_img);
            }

            if ($weddingDesign->image_cinta) {
                $existingQuoteImages = json_decode($weddingDesign->image_cinta, true);
                foreach ($existingQuoteImages as $existingImage) {
                    Storage::delete($existingImage);
                }
            }

            $weddingDesign->delete();
        }

        $data->delete();

        return redirect()->route('wedding-design6.index')->with('success', 'Data berhasil Dihapus');
    }
}
