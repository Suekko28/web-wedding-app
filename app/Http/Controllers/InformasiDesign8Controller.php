<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformasiDesign8FormRequest;
use App\Models\InformasiDesign8;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiDesign8Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = InformasiDesign8::orderBy('id', 'desc')->with(['KontenDesign8', 'weddingDesign8'])->paginate(10);
        return view('admin-design8.index', [
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
    public function store(InformasiDesign8FormRequest $request)
    {
        $data = $request->all();

        $currentDate = date('dmY'); // Mengambil tanggal dengan format Ymd
        $latestWeddingDesign8 = InformasiDesign8::orderBy('id', 'desc')->first(); // Mengambil data seserahan terakhir

        // Menentukan urutan ID Seserahan
        if ($latestWeddingDesign8) {
            $lastId = intval(substr($latestWeddingDesign8->id_weddingdesign8, -8)); // Mengambil 8 digit terakhir dari id_weddingdesign8
            $newIdNumber = $lastId + 1; // Menambah 1 dari id terakhir
        } else {
            $newIdNumber = 1; // Jika belum ada data, mulai dari 1
        }

        $idWeddingDesign8 = 'PDT-WDDS8-' . $currentDate . '-' . sprintf('%08d', $newIdNumber); // Format PDT-SSH-Ymd0001

        $data['id_weddingdesign8'] = $idWeddingDesign8;

        InformasiDesign8::create($data);

        return redirect()->route('wedding-design8.index')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InformasiDesign8FormRequest $request, string $id)
    {
        $undangan = InformasiDesign8::find($id);

        if (!$undangan) {
            return redirect()->route('wedding-design8.index')->with('error', 'Data undangan tidak ditemukan.');
        }

        $undangan->update($request->all());

        return redirect()->route('wedding-design8.index')->with('success', 'Data undangan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = InformasiDesign8::with(['KontenDesign8'])->find($id);

        // Hapus semua file pada KontenDesign8
        foreach ($data->KontenDesign8 as $weddingDesign) {
            if ($weddingDesign->banner_img) {
                Storage::delete($weddingDesign->banner_img);
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

        return redirect()->route('wedding-design8.index')->with('success', 'Data berhasil Dihapus');
    }

}
