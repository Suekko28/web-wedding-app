<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectTransferDesign4FormRequest;
use App\Http\Requests\KirimHadiahDesign4FormRequest;
use App\Http\Requests\PerjalananCintaDesign4FormRequest;
use App\Http\Requests\WeddingDesign4FormRequest;
use App\Models\DirectTransferDesign4;
use App\Models\InformasiDesign4;
use App\Models\KirimHadiahDesign4;
use App\Models\PerjalananCintaDesign4;
use App\Models\WeddingDesign4;
use Illuminate\Http\Request;
use Storage;

class WeddingDesign4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($informasiDesign4Id)
    {
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);

        $dataPerjalananCinta = PerjalananCintaDesign4::where('informasi_design4_id', $informasiDesign4Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDirectTransfer = DirectTransferDesign4::where('informasi_design4_id', $informasiDesign4Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign4::where('informasi_design4_id', $informasiDesign4Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Mengambil data mempelai pria
        $dataMempelaiPria = WeddingDesign4::where('informasi_design4_id', $informasiDesign4Id)->first();

        // Kirimkan data yang sesuai ke view
        return view('admin-design4.create', compact('informasiDesign4Id', 'dataMempelaiPria', 'informasiDesign4', 'dataPerjalananCinta', 'dataDirectTransfer', 'dataKirimHadiah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign4FormRequest $request, $informasiDesign4Id)
    {
        // Cek apakah InformasiDesign4 sudah ada
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        $data = $request->all();


        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design4', $request->file('banner_img')->hashName());
        }

        if ($request->hasFile('foto_prewedding')) {
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design4', $request->file('foto_prewedding')->hashName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design4', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design4', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design4-music', $request->file('music')->hashName());
        }

        if ($request->hasFile('quote_img')) {
            $quoteImages = $request->file('quote_img');
            $quoteImagePaths = [];

            foreach ($quoteImages as $quoteImage) {
                $quoteImagePaths[] = $quoteImage->storeAs('public/wedding-design4', $quoteImage->hashName());
            }

            $data['quote_img'] = json_encode($quoteImagePaths); // Store paths as a JSON array or adjust according to your needs
        }

        if ($request->hasFile('akad_img')) {
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design4', $request->file(key: 'akad_img')->hashName());
        }

        $data['informasi_design4_id'] = $informasiDesign4->id;

        WeddingDesign4::create($data);



        return redirect()->route('wedding-design4.index', $informasiDesign4Id)->with('success', 'Berhasil menambahkan data');

    }

    public function storePerjalananCinta(PerjalananCintaDesign4FormRequest $request, $informasiDesign4Id)
    {
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        $data = $request->all();


        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->storeAs('public/wedding-design4/perjalanan-cinta', $request->file('image1')->hashName());
        }

        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->storeAs('public/wedding-design4/perjalanan-cinta', $request->file('image2')->hashName());
        }


        $data['informasi_design4_id'] = $informasiDesign4->id;


        // Create the PerjalananCintaDesign4 record
        PerjalananCintaDesign4::create($data);

        return back()->with('success', 'Perjalanan Cinta berhasil ditambahkan.');
    }

    public function storeDirectTransfer(DirectTransferDesign4FormRequest $request, $informasiDesign4Id)
    {
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        $data = $request->all();

        $data['informasi_design4_id'] = $informasiDesign4->id;


        // Create the PerjalananCintaDesign4 record
        DirectTransferDesign4::create($data);

        return back()->with('success', 'Kirim Hadiah berhasil ditambahkan.');
    }

    public function storeKirimHadiah(KirimHadiahDesign4FormRequest $request, $informasiDesign4Id)
    {
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        $data = $request->all();

        $data['informasi_design4_id'] = $informasiDesign4->id;


        // Create the PerjalananCintaDesign4 record
        KirimHadiahDesign4::create($data);

        return back()->with('success', 'Kirim Hadiah berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $data = WeddingDesign4::findOrFail($id);

        $informasiDesign4 = InformasiDesign4::findOrFail($data->informasi_design4_id);

        $nama_undangan = $data->namaUndangan;

        $dataPerjalananCinta = PerjalananCintaDesign4::where('informasi_design4_id', $informasiDesign4->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDirectTransfer = DirectTransferDesign4::where('informasi_design4_id', $informasiDesign4->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign4::where('informasi_design4_id', $informasiDesign4->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Pass all the necessary data to the view
        return view('admin-design4.show', [
            'data' => $data,
            'informasiDesign4' => $informasiDesign4,
            'dataPerjalananCinta' => $dataPerjalananCinta,
            'dataDirectTransfer' => $dataDirectTransfer,
            'dataKirimHadiah' => $dataKirimHadiah,
            'nama_undangan' => $nama_undangan
        ]);
    }



    public function edit($informasiDesign4Id, $id)
    {
        $data = WeddingDesign4::findOrFail($id);
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        $dataPerjalananCinta = PerjalananCintaDesign4::where('informasi_design4_id', $informasiDesign4Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDirectTransfer = DirectTransferDesign4::where('informasi_design4_id', $informasiDesign4Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign4::where('informasi_design4_id', $informasiDesign4Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin-design4.edit', compact('data', 'informasiDesign4', 'dataPerjalananCinta', 'dataDirectTransfer', 'dataKirimHadiah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeddingDesign4FormRequest $request, $informasiDesign4Id, $id)
    {
        $weddingDesign4 = WeddingDesign4::findOrFail($id);
        $data = $request->all();

        // Check and handle uploaded files
        if ($request->hasFile('banner_img')) {
            if ($weddingDesign4->banner_img) {
                Storage::delete($weddingDesign4->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design4', $request->file('banner_img')->hashName());
        }

        if ($request->hasFile('foto_prewedding')) {
            if ($weddingDesign4->foto_prewedding) {
                Storage::delete($weddingDesign4->foto_prewedding);
            }
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design4', $request->file('foto_prewedding')->hashName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign4->foto_mempelai_laki) {
                Storage::delete($weddingDesign4->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design4', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign4->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign4->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design4', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign4->music) {
                Storage::delete($weddingDesign4->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design4-music', $request->file('music')->hashName());
        }

        if ($request->hasFile('quote_img')) {
            // Delete existing quote images if necessary
            if ($weddingDesign4->quote_img) {
                $existingQuoteImages = json_decode($weddingDesign4->quote_img, true);
                foreach ($existingQuoteImages as $existingImage) {
                    Storage::delete($existingImage);
                }
            }

            $quoteImages = $request->file('quote_img');
            $quoteImagePaths = [];

            foreach ($quoteImages as $quoteImage) {
                $quoteImagePaths[] = $quoteImage->storeAs('public/wedding-design4', $quoteImage->hashName());
            }

            $data['quote_img'] = json_encode($quoteImagePaths); // Store paths as a JSON array
        }

        if ($request->hasFile('akad_img')) {
            if ($weddingDesign4->akad_img) {
                Storage::delete($weddingDesign4->akad_img);
            }
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design4', $request->file('akad_img')->hashName());
        }

        $weddingDesign4->update($data);

        return redirect()->route('wedding-design4.index', $informasiDesign4Id)->with('success', 'Data berhasil diperbarui.');
    }


    public function updatePerjalananCinta(PerjalananCintaDesign4FormRequest $request, $id)
    {
        $perjalananCinta = PerjalananCintaDesign4::findOrFail($id);
        $data = $request->all();

        // Check and handle uploaded image1
        if ($request->hasFile('image1')) {
            if ($perjalananCinta->image1) {
                Storage::delete($perjalananCinta->image1);
            }
            $data['image1'] = $request->file('image1')->storeAs('public/wedding-design4/perjalanan-cinta', $request->file('image1')->hashName());
        }

        // Check and handle uploaded image2
        if ($request->hasFile('image2')) {
            if ($perjalananCinta->image2) {
                Storage::delete($perjalananCinta->image2);
            }
            $data['image2'] = $request->file('image2')->storeAs('public/wedding-design4/perjalanan-cinta', $request->file('image2')->hashName());
        }

        $perjalananCinta->update($data); // Update model PerjalananCintaDesign4

        return back()->with('success', 'Perjalanan Cinta berhasil diubah.');
    }

    public function updateDirectTransfer(DirectTransferDesign4FormRequest $request, $id)
    {
        $directTransfer = DirectTransferDesign4::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data); // Update model PerjalananCintaDesign4

        return back()->with('success', 'Direct Transfer berhasil diubah.');
    }

    public function updateKirimHadiah(KirimHadiahDesign4FormRequest $request, $id)
    {
        $directTransfer = KirimHadiahDesign4::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data); // Update model PerjalananCintaDesign4

        return back()->with('success', 'Direct Transfer berhasil diubah.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $type)
    {
        switch ($type) {
            case 'perjalanan-cinta':
                $model = PerjalananCintaDesign4::find($id);
                break;
            case 'direct-transfer':
                $model = DirectTransferDesign4::find($id);
                break;
            case 'kirim-hadiah':
                $model = KirimHadiahDesign4::find($id);
                break;
            default:
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        if ($model) {
            $model->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    }


}
