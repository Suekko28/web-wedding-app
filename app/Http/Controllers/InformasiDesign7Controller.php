<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformasiDesign7FormRequest;
use App\Models\InformasiDesign7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiDesign7Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = InformasiDesign7::orderBy('id', 'desc')->with(['KontenDesign7', 'weddingDesign7'])->paginate(10);
        return view('admin-design7.index', [
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
    public function store(InformasiDesign7FormRequest $request)
    {
        $data = $request->all();

        $currentDate = date('dmY'); // Mengambil tanggal dengan format Ymd
        $latestWeddingDesign7 = InformasiDesign7::orderBy('id', 'desc')->first(); // Mengambil data seserahan terakhir

        // Menentukan urutan ID Seserahan
        if ($latestWeddingDesign7) {
            $lastId = intval(substr($latestWeddingDesign7->id_weddingdesign7, -7)); // Mengambil 7 digit terakhir dari id_weddingdesign7
            $newIdNumber = $lastId + 1; // Menambah 1 dari id terakhir
        } else {
            $newIdNumber = 1; // Jika belum ada data, mulai dari 1
        }

        $idWeddingDesign7 = 'PDT-WDDS7-' . $currentDate . '-' . sprintf('%07d', $newIdNumber); // Format PDT-SSH-Ymd0001

        $data['id_weddingdesign7'] = $idWeddingDesign7;

        InformasiDesign7::create($data);

        return redirect()->route('wedding-design7.index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InformasiDesign7FormRequest $request, string $id)
    {
        $undangan = InformasiDesign7::find($id);

        if (!$undangan) {
            return redirect()->route('wedding-design7.index')->with('error', 'Data undangan tidak ditemukan.');
        }

        $undangan->update($request->all());

        return redirect()->route('wedding-design7.index')->with('success', 'Data undangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = InformasiDesign7::with(['KontenDesign7', 'PerjalananCintaDesign7'])->find($id);

        // Hapus semua file pada KontenDesign7
        foreach ($data->KontenDesign7 as $weddingDesign) {
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

        return redirect()->route('wedding-design7.index')->with('success', 'Data berhasil Dihapus');
    }

}
