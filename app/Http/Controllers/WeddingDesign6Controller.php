<?php

namespace App\Http\Controllers;

use App\Http\Requests\KirimHadiahDesign6FormRequest;
use App\Http\Requests\PerjalananCintaDesign6FormRequest;
use App\Http\Requests\WeddingDesign6FormRequest;
use App\Models\DirectTransferDesign6;
use App\Models\InformasiDesign6;
use App\Models\KirimHadiahDesign6;
use App\Models\PerjalananCintaDesign6;
use App\Models\WeddingDesign6;
use Illuminate\Http\Request;

class WeddingDesign6Controller extends Controller
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
    public function create($informasiDesign6Id)
    {
        $informasiDesign6 = InformasiDesign6::findOrFail($informasiDesign6Id);

        $dataPerjalananCinta = PerjalananCintaDesign6::where('informasi_design6_id', $informasiDesign6Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDirectTransfer = DirectTransferDesign6::where('informasi_design6_id', $informasiDesign6Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign6::where('informasi_design6_id', $informasiDesign6Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Mengambil data mempelai pria
        $dataMempelaiPria = WeddingDesign6::where('informasi_design6_id', $informasiDesign6Id)->first();

        $perjalananCinta = PerjalananCintaDesign6::where('informasi_design6_id', $informasiDesign6Id)->get();

        // Kirimkan data yang sesuai ke view
        return view('admin-design6.create', compact('informasiDesign6Id', 'dataMempelaiPria', 'informasiDesign6', 'dataPerjalananCinta', 'dataDirectTransfer', 'dataKirimHadiah', 'perjalananCinta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign6FormRequest $request, $informasiDesign6Id)
    {
        // Cek apakah InformasiDesign6 sudah ada
        $informasiDesign6 = InformasiDesign6::findOrFail($informasiDesign6Id);
        $data = $request->all();


        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design6', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design6', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design6', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design6', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design6-music', $request->file('music')->getClientOriginalName());
        }

        if ($request->hasFile('quote_img')) {
            $quoteImages = $request->file('quote_img');
            $quoteImagePaths = [];

            foreach ($quoteImages as $quoteImage) {
                $quoteImagePaths[] = $quoteImage->storeAs('public/wedding-design6', $quoteImage->getClientOriginalName());
            }

            $data['quote_img'] = json_encode($quoteImagePaths); // Store paths as a JSON array or adjust according to your needs
        }

        if ($request->hasFile('akad_img')) {
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design6', $request->file(key: 'akad_img')->getClientOriginalName());
        }

        $data['informasi_design6_id'] = $informasiDesign6->id;

        WeddingDesign6::create($data);



        return redirect()->route('wedding-design6.index', $informasiDesign6Id)->with('success', 'Berhasil menambahkan data');

    }

    public function storePerjalananCinta(PerjalananCintaDesign6FormRequest $request, $informasiDesign6Id)
    {
        $informasiDesign6 = InformasiDesign6::findOrFail($informasiDesign6Id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storeAs(
                'public/wedding-design6/perjalanan-cinta',
                $request->file('image')->getClientOriginalName()
            );
        }

        $data['informasi_design6_id'] = $informasiDesign6->id;
        PerjalananCintaDesign6::create($data);

        return response()->json(['message' => 'Perjalanan Cinta berhasil ditambahkan.']);
    }


    public function storeDirectTransfer(DirectTransferDesign6FormRequest $request, $informasiDesign6Id)
    {
        $informasiDesign6 = InformasiDesign6::findOrFail($informasiDesign6Id);
        $data = $request->all();

        $data['informasi_design6_id'] = $informasiDesign6->id;


        // Create the PerjalananCintaDesign6 record
        DirectTransferDesign6::create($data);

        return back()->with('success', 'Kirim Hadiah berhasil ditambahkan.');
    }

    public function storeKirimHadiah(KirimHadiahDesign6FormRequest $request, $informasiDesign6Id)
    {
        $informasiDesign6 = InformasiDesign6::findOrFail($informasiDesign6Id);
        $data = $request->all();

        $data['informasi_design6_id'] = $informasiDesign6->id;


        // Create the PerjalananCintaDesign6 record
        KirimHadiahDesign6::create($data);

        return back()->with('success', 'Kirim Hadiah berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $data = WeddingDesign6::findOrFail($id);

        $informasiDesign6 = InformasiDesign6::findOrFail($data->informasi_design6_id);

        $nama_undangan = $data->namaUndangan;

        $dataPerjalananCinta = PerjalananCintaDesign6::where('informasi_design6_id', $informasiDesign6->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDirectTransfer = DirectTransferDesign6::where('informasi_design6_id', $informasiDesign6->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign6::where('informasi_design6_id', $informasiDesign6->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Pass all the necessary data to the view
        return view('admin-design6.show', [
            'data' => $data,
            'informasiDesign6' => $informasiDesign6,
            'dataPerjalananCinta' => $dataPerjalananCinta,
            'dataDirectTransfer' => $dataDirectTransfer,
            'dataKirimHadiah' => $dataKirimHadiah,
            'nama_undangan' => $nama_undangan
        ]);
    }



    public function edit($informasiDesign6Id, $id)
    {
        $data = WeddingDesign6::findOrFail($id);
        $informasiDesign6 = InformasiDesign6::findOrFail($informasiDesign6Id);
        $dataPerjalananCinta = PerjalananCintaDesign6::where('informasi_design6_id', $informasiDesign6Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDirectTransfer = DirectTransferDesign6::where('informasi_design6_id', $informasiDesign6Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign6::where('informasi_design6_id', $informasiDesign6Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin-design6.edit', compact('data', 'informasiDesign6', 'dataPerjalananCinta', 'dataDirectTransfer', 'dataKirimHadiah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeddingDesign6FormRequest $request, $informasiDesign6Id, $id)
    {
        $weddingDesign6 = WeddingDesign6::findOrFail($id);
        $data = $request->all();

        // Check and handle uploaded files
        if ($request->hasFile('banner_img')) {
            if ($weddingDesign6->banner_img) {
                Storage::delete($weddingDesign6->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design6', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            if ($weddingDesign6->foto_prewedding) {
                Storage::delete($weddingDesign6->foto_prewedding);
            }
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design6', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign6->foto_mempelai_laki) {
                Storage::delete($weddingDesign6->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design6', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign6->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign6->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design6', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign6->music) {
                Storage::delete($weddingDesign6->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design6-music', $request->file('music')->getClientOriginalName());
        }

        if ($request->hasFile('quote_img')) {
            // Delete existing quote images if necessary
            if ($weddingDesign6->quote_img) {
                $existingQuoteImages = json_decode($weddingDesign6->quote_img, true);
                foreach ($existingQuoteImages as $existingImage) {
                    Storage::delete($existingImage);
                }
            }

            $quoteImages = $request->file('quote_img');
            $quoteImagePaths = [];

            foreach ($quoteImages as $quoteImage) {
                $quoteImagePaths[] = $quoteImage->storeAs('public/wedding-design6', $quoteImage->getClientOriginalName());
            }

            $data['quote_img'] = json_encode($quoteImagePaths); // Store paths as a JSON array
        }

        if ($request->hasFile('akad_img')) {
            if ($weddingDesign6->akad_img) {
                Storage::delete($weddingDesign6->akad_img);
            }
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design6', $request->file('akad_img')->getClientOriginalName());
        }

        $weddingDesign6->update($data);

        return redirect()->route('wedding-design6.index', $informasiDesign6Id)->with('success', 'Data berhasil diperbarui.');
    }


    public function updatePerjalananCinta(PerjalananCintaDesign6FormRequest $request, $id)
    {
        $perjalananCinta = PerjalananCintaDesign6::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($perjalananCinta->image) {
                Storage::delete($perjalananCinta->image);
            }
            $data['image'] = $request->file('image')->storeAs(
                'public/wedding-design6/perjalanan-cinta',
                $request->file('image')->getClientOriginalName()
            );
        }


        $perjalananCinta->update($data);

        return response()->json(['message' => 'Perjalanan Cinta berhasil diubah.']);
    }

    public function updateDirectTransfer(DirectTransferDesign6FormRequest $request, $id)
    {
        $directTransfer = DirectTransferDesign6::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data); // Update model PerjalananCintaDesign6

        return back()->with('success', 'Direct Transfer berhasil diubah.');
    }

    public function updateKirimHadiah(KirimHadiahDesign6FormRequest $request, $id)
    {
        $directTransfer = KirimHadiahDesign6::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data); // Update model PerjalananCintaDesign6

        return back()->with('success', 'Direct Transfer berhasil diubah.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, string $type)
    {
        switch ($type) {
            case 'perjalanan-cinta':
                $model = PerjalananCintaDesign6::find($id);
                break;
            case 'direct-transfer':
                $model = DirectTransferDesign6::find($id);
                break;
            case 'kirim-hadiah':
                $model = KirimHadiahDesign6::find($id);
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
