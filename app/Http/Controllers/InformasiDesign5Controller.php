<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformasiDesign5FormRequest;
use App\Models\InformasiDesign5;
use Illuminate\Http\Request;
use Storage;

class InformasiDesign5Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = InformasiDesign5::orderBy('id', 'desc')->with(['KontenDesign5', 'weddingDesign5'])->paginate(10);
        return view('admin-design5.index', [
            'data' => $data,
        ]);
    }

    public function store(InformasiDesign5FormRequest $request)
    {
        $data = $request->all();

        $currentDate = date('dmY'); // Mengambil tanggal dengan format Ymd
        $latestWeddingDesign5 = InformasiDesign5::orderBy('id', 'desc')->first(); // Mengambil data seserahan terakhir

        // Menentukan urutan ID Seserahan
        if ($latestWeddingDesign5) {
            $lastId = intval(substr($latestWeddingDesign5->id_weddingdesign5, -5)); // Mengambil 5 digit terakhir dari id_weddingdesign5
            $newIdNumber = $lastId + 1; // Menambah 1 dari id terakhir
        } else {
            $newIdNumber = 1; // Jika belum ada data, mulai dari 1
        }

        $idWeddingDesign5 = 'PDT-WDDS5-' . $currentDate . '-' . sprintf('%05d', $newIdNumber); // Format PDT-SSH-Ymd0001

        $data['id_weddingdesign5'] = $idWeddingDesign5;

        InformasiDesign5::create($data);

        return redirect()->route('wedding-design5.index')->with('success', 'Berhasil menambahkan data');


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InformasiDesign5FormRequest $request, $id)
    {
        $undangan = InformasiDesign5::find($id);

        if (!$undangan) {
            return redirect()->route('wedding-design5.index')->with('error', 'Data undangan tidak ditemukan.');
        }

        $undangan->update($request->all());

        return redirect()->route('wedding-design5.index')->with('success', 'Data undangan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = InformasiDesign5::with(['KontenDesign5', 'PerjalananCintaDesign5'])->find($id);


        foreach ($data->KontenDesign5 as $weddingDesign) {
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

        foreach ($data->PerjalananCintaDesign5 as $PerjalananCinta) {
            if ($PerjalananCinta->image1) {
                Storage::delete($PerjalananCinta->image1);
            }
            if ($PerjalananCinta->image2) {
                Storage::delete($PerjalananCinta->image2);
            }

            $PerjalananCinta->delete();
        }

        $data->delete();

        return redirect()->route('wedding-design5.index')->with('success', 'Data berhasil Dihapus');
    }
}
