<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectTransferDesign9FormRequest;
use App\Http\Requests\KirimHadiahDesign9FormRequest;
use App\Http\Requests\WeddingDesign9FormRequest;
use App\Models\DirectTransferDesign9;
use App\Models\InformasiDesign9;
use App\Models\KirimHadiahDesign9;
use App\Models\WeddingDesign9;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WeddingDesign9Controller extends Controller
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
    public function create($informasiDesign9Id)
    {
        $informasiDesign9 = InformasiDesign9::findOrFail($informasiDesign9Id);

        $dataDirectTransfer = DirectTransferDesign9::where('informasi_design9_id', $informasiDesign9Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign9::where('informasi_design9_id', $informasiDesign9Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Mengambil data mempelai pria
        $dataMempelaiPria = WeddingDesign9::where('informasi_design9_id', $informasiDesign9Id)->first();


        // Kirimkan data yang sesuai ke view
        return view('admin-design9.create', compact('informasiDesign9Id', 'dataMempelaiPria', 'informasiDesign9', 'dataDirectTransfer', 'dataKirimHadiah', ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign9FormRequest $request, $informasiDesign9Id)
    {
        // Cek apakah InformasiDesign9 sudah ada
        $informasiDesign9 = InformasiDesign9::findOrFail($informasiDesign9Id);
        $data = $request->all();

        // Default values
        $defaultJudulPembuka = 'Assalamu’alaikum Wr. Wb.';
        $defaultJudulJadwal = "Jadwal Pernikahan";
        $defaultJudulPerjalananCinta = 'Perjalanan Cinta Kami';
        $defaultDeskripsiPembuka = "Tanpa mengurangi rasa hormat\nkami mengundang Bapak/Ibu/Saudara/i\npada pernikahan kami:";
        $defaultDeskripsiPenutup = "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do’a restu. Atas kehadiran dan do’a restunya kami ucapkan terima kasih. Kami yang berbahagia";

        // Cek dan set default jika tidak ada input / sama
        $data['judul_pembuka'] = $request->filled('judul_pembuka') ? $request->input('judul_pembuka') : $defaultJudulPembuka;
        $data['judul_jadwal'] = $request->filled('judul_jadwal') ? $request->input('judul_jadwal') : $defaultJudulJadwal;
        $data['deskripsi_pembuka'] = $request->filled('deskripsi_pembuka') ? $request->input('deskripsi_pembuka') : $defaultDeskripsiPembuka;
        $data['judul_cinta'] = $request->filled('judul_cinta') ? $request->input('judul_cinta') : $defaultJudulPerjalananCinta;
        $data['deskripsi_cinta'] = $request->filled('deskripsi_cinta') ? $request->input('deskripsi_cinta') : $defaultDeskripsiPembuka;
        $data['deskripsi_penutup'] = $request->filled('deskripsi_penutup') ? $request->input('deskripsi_penutup') : $defaultDeskripsiPenutup;

        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design9', $request->file('banner_img')->hashName());
        }

        if ($request->hasFile('foto_prewedding')) {
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design9', $request->file('foto_prewedding')->hashName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design9', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design9', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design9-music', $request->file('music')->hashName());
        }


        if ($request->hasFile('akad_img')) {
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design9', $request->file(key: 'akad_img')->hashName());
        }

        if ($request->hasFile('image_cinta')) {
            $cintaImages = $request->file('image_cinta');
            $cintaImagesPaths = [];

            foreach ($cintaImages as $quoteImage) {
                $cintaImagesPaths[] = $quoteImage->storeAs('public/wedding-design9', $quoteImage->hashName());
            }

            $data['image_cinta'] = json_encode($cintaImagesPaths); // Store paths as a JSON array or adjust according to your needs
        }

        $data['informasi_design9_id'] = $informasiDesign9->id;

        WeddingDesign9::create($data);



        return redirect()->route('wedding-design9.index', $informasiDesign9Id)->with('success', 'Berhasil menambahkan data');

    }

    public function show(string $id)
    {
        $data = WeddingDesign9::findOrFail($id);

        $informasiDesign9 = InformasiDesign9::findOrFail($data->informasi_design9_id);

        $nama_undangan = $data->namaUndangan;

        $dataDirectTransfer = DirectTransferDesign9::where('informasi_design9_id', $informasiDesign9->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign9::where('informasi_design9_id', $informasiDesign9->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Pass all the necessary data to the view
        return view('admin-design9.show', [
            'data' => $data,
            'informasiDesign9' => $informasiDesign9,
            'dataDirectTransfer' => $dataDirectTransfer,
            'dataKirimHadiah' => $dataKirimHadiah,
            'nama_undangan' => $nama_undangan
        ]);
    }



    public function edit($informasiDesign9Id, $id)
    {
        $data = WeddingDesign9::findOrFail($id);
        $informasiDesign9 = InformasiDesign9::findOrFail($informasiDesign9Id);

        $dataDirectTransfer = DirectTransferDesign9::where('informasi_design9_id', $informasiDesign9Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign9::where('informasi_design9_id', $informasiDesign9Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin-design9.edit', compact('data', 'informasiDesign9', 'dataDirectTransfer', 'dataKirimHadiah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeddingDesign9FormRequest $request, $informasiDesign9Id, $id)
    {
        $weddingDesign9 = WeddingDesign9::findOrFail($id);
        $data = $request->all();

        // Default values
        $defaultJudulPembuka = 'Assalamu’alaikum Wr. Wb.';
        $defaultJudulJadwal = "Jadwal Pernikahan";
        $defaultJudulPerjalananCinta = 'Perjalanan Cinta Kami';
        $defaultDeskripsiPembuka = "Tanpa mengurangi rasa hormat\nkami mengundang Bapak/Ibu/Saudara/i\npada pernikahan kami:";
        $defaultDeskripsiPenutup = "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do’a restu. Atas kehadiran dan do’a restunya kami ucapkan terima kasih. Kami yang berbahagia";

        // Cek dan set default jika tidak ada input / sama
        $data['judul_pembuka'] = $request->filled('judul_pembuka') ? $request->input('judul_pembuka') : $defaultJudulPembuka;
        $data['judul_jadwal'] = $request->filled('judul_jadwal') ? $request->input('judul_jadwal') : $defaultJudulJadwal;
        $data['deskripsi_pembuka'] = $request->filled('deskripsi_pembuka') ? $request->input('deskripsi_pembuka') : $defaultDeskripsiPembuka;
        $data['judul_cinta'] = $request->filled('judul_cinta') ? $request->input('judul_cinta') : $defaultJudulPerjalananCinta;
        $data['deskripsi_cinta'] = $request->filled('deskripsi_cinta') ? $request->input('deskripsi_cinta') : $defaultDeskripsiPembuka;
        $data['deskripsi_penutup'] = $request->filled('deskripsi_penutup') ? $request->input('deskripsi_penutup') : $defaultDeskripsiPenutup;

        // Handle file uploads & delete old files
        if ($request->hasFile('banner_img')) {
            if ($weddingDesign9->banner_img) {
                Storage::delete($weddingDesign9->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design9', $request->file('banner_img')->hashName());
        }

        if ($request->hasFile('foto_prewedding')) {
            if ($weddingDesign9->foto_prewedding) {
                Storage::delete($weddingDesign9->foto_prewedding);
            }
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design9', $request->file('foto_prewedding')->hashName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign9->foto_mempelai_laki) {
                Storage::delete($weddingDesign9->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design9', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign9->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign9->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design9', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign9->music) {
                Storage::delete($weddingDesign9->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design9-music', $request->file('music')->hashName());
        }

        if ($request->hasFile('akad_img')) {
            if ($weddingDesign9->akad_img) {
                Storage::delete($weddingDesign9->akad_img);
            }
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design9', $request->file('akad_img')->hashName());
        }

        // Optional: Update multiple image_cinta jika dibolehkan saat edit
        if ($request->hasFile('image_cinta')) {
            // Hapus data lama jika ingin replace semua
            if ($weddingDesign9->image_cinta) {
                $oldImages = json_decode($weddingDesign9->image_cinta, true);
                foreach ($oldImages as $img) {
                    Storage::delete($img);
                }
            }

            $cintaImages = $request->file('image_cinta');
            $cintaImagesPaths = [];

            foreach ($cintaImages as $quoteImage) {
                $cintaImagesPaths[] = $quoteImage->storeAs('public/wedding-design9', $quoteImage->hashName());
            }

            $data['image_cinta'] = json_encode($cintaImagesPaths);
        }

        $weddingDesign9->update($data);

        return redirect()->route('wedding-design9.index', $informasiDesign9Id)->with('success', 'Data berhasil diperbarui.');
    }


    // Function Controller Direct Transfer

    public function storeDirectTransfer(DirectTransferDesign9FormRequest $request, $informasiDesign9Id)
    {
        $informasiDesign9 = InformasiDesign9::findOrFail($informasiDesign9Id);
        $data = $request->all();

        $data['informasi_design9_id'] = $informasiDesign9->id;

        DirectTransferDesign9::create($data);

        return response()->json(['message' => 'Direct Transfer berhasil ditambahkan.']);
    }

    public function updateDirectTransfer(DirectTransferDesign9FormRequest $request, $id)
    {
        $directTransfer = DirectTransferDesign9::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data);

        return response()->json(['message' => 'Direct Transfer berhasil diubah.']);
    }

    public function destroyDirectTransfer($id)
    {
        $directTransfer = DirectTransferDesign9::findOrFail($id);

        $directTransfer->delete();

        return response()->json(['message' => 'Direct Transfer berhasil dihapus']);
    }


    // Function Controller Kirim Hadiah

    public function storeKirimHadiah(KirimHadiahDesign9FormRequest $request, $informasiDesign9Id)
    {
        $informasiDesign9 = InformasiDesign9::findOrFail($informasiDesign9Id);
        $data = $request->all();
        $data['informasi_design9_id'] = $informasiDesign9->id;

        KirimHadiahDesign9::create($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil ditambahkan.']);
    }

    public function updateKirimHadiah(KirimHadiahDesign9FormRequest $request, $id)
    {
        $kirimHadiah = KirimHadiahDesign9::findOrFail($id);
        $data = $request->all();

        $kirimHadiah->update($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil diubah.']);
    }

    public function destroyKirimHadiah($id)
    {
        $kirimHadiah = KirimHadiahDesign9::findOrFail($id);

        $kirimHadiah->delete();

        return response()->json(['message' => 'Kirim Hadiah berhasil dihapus']);
    }

}
