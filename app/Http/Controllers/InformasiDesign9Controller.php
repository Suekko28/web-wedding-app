<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformasiDesign9FormRequest;
use App\Models\InformasiDesign9;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiDesign9Controller extends Controller
{
    public function index()
    {
        $data = InformasiDesign9::orderBy('id', 'desc')->with(['KontenDesign9', 'weddingDesign9'])->paginate(10);
        return view('admin-design9.index', [
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
    public function store(InformasiDesign9FormRequest $request)
    {
        $data = $request->all();

        $currentDate = date('dmY'); // Mengambil tanggal dengan format Ymd
        $latestWeddingDesign9 = InformasiDesign9::orderBy('id', 'desc')->first(); // Mengambil data seserahan terakhir

        // Menentukan urutan ID Seserahan
        if ($latestWeddingDesign9) {
            $lastId = intval(substr($latestWeddingDesign9->id_weddingdesign9, -9)); // Mengambil 9 digit terakhir dari id_weddingdesign9
            $newIdNumber = $lastId + 1; // Menambah 1 dari id terakhir
        } else {
            $newIdNumber = 1; // Jika belum ada data, mulai dari 1
        }

        $idWeddingDesign9 = 'PDT-WDDS9-' . $currentDate . '-' . sprintf('%09d', $newIdNumber); // Format PDT-SSH-Ymd0001

        $data['id_weddingdesign9'] = $idWeddingDesign9;

        InformasiDesign9::create($data);

        return redirect()->route('wedding-design9.index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InformasiDesign9FormRequest $request, string $id)
    {
        $undangan = InformasiDesign9::find($id);

        if (!$undangan) {
            return redirect()->route('wedding-design9.index')->with('error', 'Data undangan tidak ditemukan.');
        }

        $undangan->update($request->all());

        return redirect()->route('wedding-design9.index')->with('success', 'Data undangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = InformasiDesign9::with(['KontenDesign9'])->find($id);

        // Hapus semua file pada KontenDesign9
        foreach ($data->KontenDesign9 as $weddingDesign) {
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

        return redirect()->route('wedding-design9.index')->with('success', 'Data berhasil Dihapus');
    }

}
