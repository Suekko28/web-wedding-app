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

        //Default Values
        $defaultJudulJadwal = "Jadwal Pernikahan";
        $defaultDeskripsiPenutup = 'Thank You';
        $defaultJudulAkad = "Akad";
        $defaultJudulResepsi = "Resepsi";

        // Cek dan set default jika tidak ada input / sama
        $data['judul_jadwal'] = $request->filled('judul_jadwal') ? $request->input('judul_jadwal') : $defaultJudulJadwal;
        $data['judul_akad'] = $request->filled('judul_akad') ? $request->input('judul_akad') : $defaultJudulAkad;
        $data['judul_resepsi'] = $request->filled('judul_resepsi') ? $request->input('judul_resepsi') : $defaultJudulResepsi;
        $data['deskripsi_penutup'] = $request->filled('deskripsi_penutup') ? $request->input('deskripsi_penutup') : $defaultDeskripsiPenutup;


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

         //Default Values
         $defaultJudulJadwal = "Jadwal Pernikahan";
         $defaultDeskripsiPenutup = 'Thank You';
         $defaultJudulAkad = "Akad";
         $defaultJudulResepsi = "Resepsi";
 
         // Cek dan set default jika tidak ada input / sama
         $data['judul_jadwal'] = $request->filled('judul_jadwal') ? $request->input('judul_jadwal') : $defaultJudulJadwal;
         $data['judul_akad'] = $request->filled('judul_akad') ? $request->input('judul_akad') : $defaultJudulAkad;
         $data['judul_resepsi'] = $request->filled('judul_resepsi') ? $request->input('judul_resepsi') : $defaultJudulResepsi;
         $data['deskripsi_penutup'] = $request->filled('deskripsi_penutup') ? $request->input('deskripsi_penutup') : $defaultDeskripsiPenutup;
 

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

    // Function Controller Perjalanan Cinta

    public function storePerjalananCinta(PerjalananCintaDesign4FormRequest $request, $informasiDesign4Id)
    {
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        $data = $request->all();


        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->storeAs('public/wedding-design4/perjalanan-cinta', $request->file('image1')->hashName());
        }


        $data['informasi_design4_id'] = $informasiDesign4->id;


        // Create the PerjalananCintaDesign4 record
        PerjalananCintaDesign4::create($data);

        return response()->json(['message' => 'Perjalanan Cinta berhasil ditambahkan.']);
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

        $perjalananCinta->update($data); // Update model PerjalananCintaDesign4

        return response()->json(['message' => 'Perjalanan Cinta berhasil diubah']);
    }

    public function destroyPerjalananCinta($id)
    {
        $directTransfer = PerjalananCintaDesign4::findOrFail($id);

        $directTransfer->delete();

        return response()->json(['message' => 'Perjalanan Cinta berhasil dihapus']);
    }



    // Function Controller Direct Transfer

    public function storeDirectTransfer(DirectTransferDesign4FormRequest $request, $informasiDesign4Id)
    {
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        $data = $request->all();

        $data['informasi_design4_id'] = $informasiDesign4->id;

        DirectTransferDesign4::create($data);

        return response()->json(['message' => 'Direct Transfer berhasil ditambahkan.']);
    }

    public function updateDirectTransfer(DirectTransferDesign4FormRequest $request, $id)
    {
        $directTransfer = DirectTransferDesign4::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data);

        return response()->json(['message' => 'Direct Transfer berhasil diubah.']);
    }

    public function destroyDirectTransfer($id)
    {
        $directTransfer = DirectTransferDesign4::findOrFail($id);

        $directTransfer->delete();

        return response()->json(['message' => 'Direct Transfer berhasil dihapus']);
    }


    // Function Controller Kirim Hadiah

    public function storeKirimHadiah(KirimHadiahDesign4FormRequest $request, $informasiDesign4Id)
    {
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        $data = $request->all();
        $data['informasi_design4_id'] = $informasiDesign4->id;

        KirimHadiahDesign4::create($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil ditambahkan.']);
    }

    public function updateKirimHadiah(KirimHadiahDesign4FormRequest $request, $id)
    {
        $kirimHadiah = KirimHadiahDesign4::findOrFail($id);
        $data = $request->all();

        $kirimHadiah->update($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil diubah.']);
    }

    public function destroyKirimHadiah($id)
    {
        $kirimHadiah = KirimHadiahDesign4::findOrFail($id);

        $kirimHadiah->delete();

        return response()->json(['message' => 'Kirim Hadiah berhasil dihapus']);
    }



}
