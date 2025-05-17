<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformasiDesign10FormRequest;
use App\Models\InformasiDesign10;
use Illuminate\Http\Request;
use Storage;

class InformasiDesign10Controller extends Controller
{
    public function index()
    {
        $data = InformasiDesign10::orderBy('id', 'desc')->with(['KontenDesign10', 'weddingDesign10'])->paginate(10);
        return view('admin-design10.index', [
            'data' => $data,
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
    public function store(InformasiDesign10FormRequest $request)
    {
        $data = $request->all();

        $currentDate = date('dmY'); // Mengambil tanggal dengan format Ymd
        $latestWeddingDesign10 = InformasiDesign10::orderBy('id', 'desc')->first(); // Mengambil data seserahan terakhir

        // Menentukan urutan ID Seserahan
        if ($latestWeddingDesign10) {
            $lastId = intval(substr($latestWeddingDesign10->id_weddingdesign10, -4)); // Mengambil 4 digit terakhir dari id_weddingdesign10
            $newIdNumber = $lastId + 1; // Menambah 1 dari id terakhir
        } else {
            $newIdNumber = 1; // Jika belum ada data, mulai dari 1
        }

        $idWeddingDesign10 = 'PDT-WDDS10-' . $currentDate . '-' . sprintf('%04d', $newIdNumber); // Format PDT-SSH-Ymd0001

        $data['slug_nama_pasangan'] = strtolower(str_replace(' ', '-', $data['nama_pasangan']));
        $data['id_weddingdesign10'] = $idWeddingDesign10;

        InformasiDesign10::create($data);

        return redirect()->route('wedding-design10.index')->with('success', 'Berhasil menambahkan data');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InformasiDesign10FormRequest $request, $id)
    {
        $undangan = InformasiDesign10::find($id);

        if (!$undangan) {
            return redirect()->route('wedding-design10.index')->with('error', 'Data undangan tidak ditemukan.');
        }

        $data = $request->all();
        $data['slug_nama_pasangan'] = strtolower(str_replace(' ', '-', $request->nama_pasangan));

        $undangan->update($data);

        return redirect()->route('wedding-design10.index')->with('success', 'Data undangan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = InformasiDesign10::with(['KontenDesign10', 'DresscodeDesign10'])->find($id);


        foreach ($data->KontenDesign10 as $weddingDesign) {
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

            if ($weddingDesign->quote_img) {
                $existingQuoteImages = json_decode($weddingDesign->quote_img, true);
                foreach ($existingQuoteImages as $existingImage) {
                    Storage::delete($existingImage);
                }
            }

            if ($weddingDesign->akad_img) {
                Storage::delete($weddingDesign->akad_img);
            }

            $weddingDesign->delete();
        }

        foreach ($data->DresscodeDesign10 as $Dresscode) {
            if ($Dresscode->image) {
                Storage::delete($Dresscode->image);
            }

            $Dresscode->delete();
        }

        $data->delete();

        return redirect()->route('wedding-design10.index')->with('success', 'Data berhasil Dihapus');
    }

}
