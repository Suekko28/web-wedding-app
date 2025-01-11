<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeddingDesign5FormRequest;
use App\Models\DirectTransferDesign5;
use App\Models\InformasiDesign5;
use App\Models\KirimHadiahDesign5;
use App\Models\PerjalananCintaDesign5;
use App\Models\WeddingDesign5;
use Illuminate\Http\Request;
use Storage;

class WeddingDesign5Controller extends Controller
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
    public function create($informasiDesign5Id)
    {
        $informasiDesign5 = InformasiDesign5::findOrFail($informasiDesign5Id);

        $dataPerjalananCinta = PerjalananCintaDesign5::where('informasi_design5_id', $informasiDesign5Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDirectTransfer = DirectTransferDesign5::where('informasi_design5_id', $informasiDesign5Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign5::where('informasi_design5_id', $informasiDesign5Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Mengambil data mempelai pria
        $dataMempelaiPria = WeddingDesign5::where('informasi_design5_id', $informasiDesign5Id)->first();

        // Kirimkan data yang sesuai ke view
        return view('admin-design5.create', compact('informasiDesign5Id', 'dataMempelaiPria', 'informasiDesign5', 'dataPerjalananCinta', 'dataDirectTransfer', 'dataKirimHadiah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign5FormRequest $request, $informasiDesign5Id)
    {
        // Cek apakah InformasiDesign5 sudah ada
        $informasiDesign5 = InformasiDesign5::findOrFail($informasiDesign5Id);
        $data = $request->all();


        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design5', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design5', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design5', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design5', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design5-music', $request->file('music')->getClientOriginalName());
        }

        if ($request->hasFile('quote_img')) {
            $quoteImages = $request->file('quote_img');
            $quoteImagePaths = [];

            foreach ($quoteImages as $quoteImage) {
                $quoteImagePaths[] = $quoteImage->storeAs('public/wedding-design5', $quoteImage->getClientOriginalName());
            }

            $data['quote_img'] = json_encode($quoteImagePaths); // Store paths as a JSON array or adjust according to your needs
        }

        if ($request->hasFile('akad_img')) {
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design5', $request->file(key: 'akad_img')->getClientOriginalName());
        }

        $data['informasi_design5_id'] = $informasiDesign5->id;

        WeddingDesign5::create($data);



        return redirect()->route('wedding-design5.index', $informasiDesign5Id)->with('success', 'Berhasil menambahkan data');

    }

    public function storePerjalananCinta(PerjalananCintaDesign5FormRequest $request, $informasiDesign5Id)
    {
        $informasiDesign5 = InformasiDesign5::findOrFail($informasiDesign5Id);
        $data = $request->all();


        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->storeAs('public/wedding-design5/perjalanan-cinta', $request->file('image1')->getClientOriginalName());
        }

        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->storeAs('public/wedding-design5/perjalanan-cinta', $request->file('image2')->getClientOriginalName());
        }


        $data['informasi_design5_id'] = $informasiDesign5->id;


        // Create the PerjalananCintaDesign5 record
        PerjalananCintaDesign5::create($data);

        return back()->with('success', 'Perjalanan Cinta berhasil ditambahkan.');
    }

    public function storeDirectTransfer(DirectTransferDesign5FormRequest $request, $informasiDesign5Id)
    {
        $informasiDesign5 = InformasiDesign5::findOrFail($informasiDesign5Id);
        $data = $request->all();

        $data['informasi_design5_id'] = $informasiDesign5->id;


        // Create the PerjalananCintaDesign5 record
        DirectTransferDesign5::create($data);

        return back()->with('success', 'Kirim Hadiah berhasil ditambahkan.');
    }

    public function storeKirimHadiah(KirimHadiahDesign5FormRequest $request, $informasiDesign5Id)
    {
        $informasiDesign5 = InformasiDesign5::findOrFail($informasiDesign5Id);
        $data = $request->all();

        $data['informasi_design5_id'] = $informasiDesign5->id;


        // Create the PerjalananCintaDesign5 record
        KirimHadiahDesign5::create($data);

        return back()->with('success', 'Kirim Hadiah berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $data = WeddingDesign5::findOrFail($id);

        $informasiDesign5 = InformasiDesign5::findOrFail($data->informasi_design5_id);

        $nama_undangan = $data->namaUndangan;

        $dataPerjalananCinta = PerjalananCintaDesign5::where('informasi_design5_id', $informasiDesign5->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDirectTransfer = DirectTransferDesign5::where('informasi_design5_id', $informasiDesign5->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign5::where('informasi_design5_id', $informasiDesign5->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Pass all the necessary data to the view
        return view('admin-design5.show', [
            'data' => $data,
            'informasiDesign5' => $informasiDesign5,
            'dataPerjalananCinta' => $dataPerjalananCinta,
            'dataDirectTransfer' => $dataDirectTransfer,
            'dataKirimHadiah' => $dataKirimHadiah,
            'nama_undangan' => $nama_undangan
        ]);
    }



    public function edit($informasiDesign5Id, $id)
    {
        $data = WeddingDesign5::findOrFail($id);
        $informasiDesign5 = InformasiDesign5::findOrFail($informasiDesign5Id);
        $dataPerjalananCinta = PerjalananCintaDesign5::where('informasi_design5_id', $informasiDesign5Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDirectTransfer = DirectTransferDesign5::where('informasi_design5_id', $informasiDesign5Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign5::where('informasi_design5_id', $informasiDesign5Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin-design5.edit', compact('data', 'informasiDesign5', 'dataPerjalananCinta', 'dataDirectTransfer', 'dataKirimHadiah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeddingDesign5FormRequest $request, $informasiDesign5Id, $id)
    {
        $weddingDesign5 = WeddingDesign5::findOrFail($id);
        $data = $request->all();

        // Check and handle uploaded files
        if ($request->hasFile('banner_img')) {
            if ($weddingDesign5->banner_img) {
                Storage::delete($weddingDesign5->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design5', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            if ($weddingDesign5->foto_prewedding) {
                Storage::delete($weddingDesign5->foto_prewedding);
            }
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design5', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign5->foto_mempelai_laki) {
                Storage::delete($weddingDesign5->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design5', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign5->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign5->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design5', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign5->music) {
                Storage::delete($weddingDesign5->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design5-music', $request->file('music')->getClientOriginalName());
        }

        if ($request->hasFile('quote_img')) {
            // Delete existing quote images if necessary
            if ($weddingDesign5->quote_img) {
                $existingQuoteImages = json_decode($weddingDesign5->quote_img, true);
                foreach ($existingQuoteImages as $existingImage) {
                    Storage::delete($existingImage);
                }
            }

            $quoteImages = $request->file('quote_img');
            $quoteImagePaths = [];

            foreach ($quoteImages as $quoteImage) {
                $quoteImagePaths[] = $quoteImage->storeAs('public/wedding-design5', $quoteImage->getClientOriginalName());
            }

            $data['quote_img'] = json_encode($quoteImagePaths); // Store paths as a JSON array
        }

        if ($request->hasFile('akad_img')) {
            if ($weddingDesign5->akad_img) {
                Storage::delete($weddingDesign5->akad_img);
            }
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design5', $request->file('akad_img')->getClientOriginalName());
        }

        $weddingDesign5->update($data);

        return redirect()->route('wedding-design5.index', $informasiDesign5Id)->with('success', 'Data berhasil diperbarui.');
    }


    public function updatePerjalananCinta(PerjalananCintaDesign5FormRequest $request, $id)
    {
        $perjalananCinta = PerjalananCintaDesign5::findOrFail($id);
        $data = $request->all();

        // Check and handle uploaded image1
        if ($request->hasFile('image1')) {
            if ($perjalananCinta->image1) {
                Storage::delete($perjalananCinta->image1);
            }
            $data['image1'] = $request->file('image1')->storeAs('public/wedding-design5/perjalanan-cinta', $request->file('image1')->getClientOriginalName());
        }

        // Check and handle uploaded image2
        if ($request->hasFile('image2')) {
            if ($perjalananCinta->image2) {
                Storage::delete($perjalananCinta->image2);
            }
            $data['image2'] = $request->file('image2')->storeAs('public/wedding-design5/perjalanan-cinta', $request->file('image2')->getClientOriginalName());
        }

        $perjalananCinta->update($data); // Update model PerjalananCintaDesign5

        return back()->with('success', 'Perjalanan Cinta berhasil diubah.');
    }

    public function updateDirectTransfer(DirectTransferDesign5FormRequest $request, $id)
    {
        $directTransfer = DirectTransferDesign5::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data); // Update model PerjalananCintaDesign5

        return back()->with('success', 'Direct Transfer berhasil diubah.');
    }

    public function updateKirimHadiah(KirimHadiahDesign5FormRequest $request, $id)
    {
        $directTransfer = KirimHadiahDesign5::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data); // Update model PerjalananCintaDesign5

        return back()->with('success', 'Direct Transfer berhasil diubah.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $type)
    {
        switch ($type) {
            case 'perjalanan-cinta':
                $model = PerjalananCintaDesign5::find($id);
                break;
            case 'direct-transfer':
                $model = DirectTransferDesign5::find($id);
                break;
            case 'kirim-hadiah':
                $model = KirimHadiahDesign5::find($id);
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
