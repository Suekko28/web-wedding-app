<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectTransferDesign7FormRequest;
use App\Http\Requests\KirimHadiahDesign7FormRequest;
use App\Http\Requests\WeddingDesign7FormRequest;
use App\Models\DirectTransferDesign7;
use App\Models\InformasiDesign7;
use App\Models\KirimHadiahDesign7;
use App\Models\WeddingDesign7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WeddingDesign7Controlller extends Controller
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
    public function create($informasiDesign7Id)
    {
        $informasiDesign7 = InformasiDesign7::findOrFail($informasiDesign7Id);

        $dataDirectTransfer = DirectTransferDesign7::where('informasi_design7_id', $informasiDesign7Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign7::where('informasi_design7_id', $informasiDesign7Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Mengambil data mempelai pria
        $dataMempelaiPria = WeddingDesign7::where('informasi_design7_id', $informasiDesign7Id)->first();


        // Kirimkan data yang sesuai ke view
        return view('admin-design7.create', compact('informasiDesign7Id', 'dataMempelaiPria', 'informasiDesign7', 'dataDirectTransfer', 'dataKirimHadiah', ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign7FormRequest $request, $informasiDesign7Id)
    {
        // Cek apakah InformasiDesign7 sudah ada
        $informasiDesign7 = InformasiDesign7::findOrFail($informasiDesign7Id);
        $data = $request->all();

        // Default values
        $defaultJudulPembuka = 'Assalamu’alaikum Wr. Wb.';
        $defaultJudulJadwal = "Jadwal Pernikahan";
        $defaultJudulPerjalananCinta = 'Perjalanan Cinta Kami';
        $defaultDeskripsiPembuka = "Tanpa mengurangi rasa hormat\nkami mengundang Bapak/Ibu/Saudara/i\npada pernikahan kami:";
        $defaultDeskripsiPenutup = "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do’a restu. Atas kehadiran dan do’a restunya kami ucapkan terima kasih. Kami yang berbahagia";
        $defaultJudulAkad = "Akad";
        $defaultJudulResepsi = "Resepsi";

        // Cek dan set default jika tidak ada input / sama
        $data['judul_pembuka'] = $request->filled('judul_pembuka') ? $request->input('judul_pembuka') : $defaultJudulPembuka;
        $data['judul_jadwal'] = $request->filled('judul_jadwal') ? $request->input('judul_jadwal') : $defaultJudulJadwal;
        $data['deskripsi_pembuka'] = $request->filled('deskripsi_pembuka') ? $request->input('deskripsi_pembuka') : $defaultDeskripsiPembuka;
        $data['judul_cinta'] = $request->filled('judul_cinta') ? $request->input('judul_cinta') : $defaultJudulPerjalananCinta;
        $data['deskripsi_cinta'] = $request->filled('deskripsi_cinta') ? $request->input('deskripsi_cinta') : $defaultDeskripsiPembuka;
        $data['deskripsi_penutup'] = $request->filled('deskripsi_penutup') ? $request->input('deskripsi_penutup') : $defaultDeskripsiPenutup;
        $data['judul_akad'] = $request->filled('judul_akad') ? $request->input('judul_akad') : $defaultJudulAkad;
        $data['judul_resepsi'] = $request->filled('judul_resepsi') ? $request->input('judul_resepsi') : $defaultJudulResepsi;

        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design7', $request->file('banner_img')->hashName());
        }

        if ($request->hasFile('foto_prewedding')) {
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design7', $request->file('foto_prewedding')->hashName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design7', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design7', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design7-music', $request->file('music')->hashName());
        }


        if ($request->hasFile('akad_img')) {
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design7', $request->file(key: 'akad_img')->hashName());
        }

        if ($request->hasFile('image_cinta')) {
            $cintaImages = $request->file('image_cinta');
            $cintaImagesPaths = [];

            foreach ($cintaImages as $quoteImage) {
                $cintaImagesPaths[] = $quoteImage->storeAs('public/wedding-design7', $quoteImage->hashName());
            }

            $data['image_cinta'] = json_encode($cintaImagesPaths); // Store paths as a JSON array or adjust according to your needs
        }

        $data['informasi_design7_id'] = $informasiDesign7->id;

        WeddingDesign7::create($data);



        return redirect()->route('wedding-design7.index', $informasiDesign7Id)->with('success', 'Berhasil menambahkan data');

    }

    public function show(string $id)
    {
        $data = WeddingDesign7::findOrFail($id);

        $informasiDesign7 = InformasiDesign7::findOrFail($data->informasi_design7_id);

        $nama_undangan = $data->namaUndangan;

        $dataDirectTransfer = DirectTransferDesign7::where('informasi_design7_id', $informasiDesign7->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign7::where('informasi_design7_id', $informasiDesign7->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Pass all the necessary data to the view
        return view('admin-design7.show', [
            'data' => $data,
            'informasiDesign7' => $informasiDesign7,
            'dataDirectTransfer' => $dataDirectTransfer,
            'dataKirimHadiah' => $dataKirimHadiah,
            'nama_undangan' => $nama_undangan
        ]);
    }



    public function edit($informasiDesign7Id, $id)
    {
        $data = WeddingDesign7::findOrFail($id);
        $informasiDesign7 = InformasiDesign7::findOrFail($informasiDesign7Id);

        $dataDirectTransfer = DirectTransferDesign7::where('informasi_design7_id', $informasiDesign7Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign7::where('informasi_design7_id', $informasiDesign7Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin-design7.edit', compact('data', 'informasiDesign7', 'dataDirectTransfer', 'dataKirimHadiah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeddingDesign7FormRequest $request, $informasiDesign7Id, $id)
    {
        $weddingDesign7 = WeddingDesign7::findOrFail($id);
        $data = $request->all();

        // Default values
        $defaultJudulPembuka = 'Assalamu’alaikum Wr. Wb.';
        $defaultJudulJadwal = "Jadwal Pernikahan";
        $defaultJudulPerjalananCinta = 'Perjalanan Cinta Kami';
        $defaultDeskripsiPembuka = "Tanpa mengurangi rasa hormat\nkami mengundang Bapak/Ibu/Saudara/i\npada pernikahan kami:";
        $defaultDeskripsiPenutup = "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do’a restu. Atas kehadiran dan do’a restunya kami ucapkan terima kasih. Kami yang berbahagia";
        $defaultJudulAkad = "Akad";
        $defaultJudulResepsi = "Resepsi";

        // Cek dan set default jika tidak ada input / sama
        $data['judul_pembuka'] = $request->filled('judul_pembuka') ? $request->input('judul_pembuka') : $defaultJudulPembuka;
        $data['judul_jadwal'] = $request->filled('judul_jadwal') ? $request->input('judul_jadwal') : $defaultJudulJadwal;
        $data['deskripsi_pembuka'] = $request->filled('deskripsi_pembuka') ? $request->input('deskripsi_pembuka') : $defaultDeskripsiPembuka;
        $data['judul_cinta'] = $request->filled('judul_cinta') ? $request->input('judul_cinta') : $defaultJudulPerjalananCinta;
        $data['deskripsi_cinta'] = $request->filled('deskripsi_cinta') ? $request->input('deskripsi_cinta') : $defaultDeskripsiPembuka;
        $data['deskripsi_penutup'] = $request->filled('deskripsi_penutup') ? $request->input('deskripsi_penutup') : $defaultDeskripsiPenutup;
        $data['judul_akad'] = $request->filled('judul_akad') ? $request->input('judul_akad') : $defaultJudulAkad;
        $data['judul_resepsi'] = $request->filled('judul_resepsi') ? $request->input('judul_resepsi') : $defaultJudulResepsi;

        // Handle file uploads & delete old files
        if ($request->hasFile('banner_img')) {
            if ($weddingDesign7->banner_img) {
                Storage::delete($weddingDesign7->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design7', $request->file('banner_img')->hashName());
        }

        if ($request->hasFile('foto_prewedding')) {
            if ($weddingDesign7->foto_prewedding) {
                Storage::delete($weddingDesign7->foto_prewedding);
            }
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design7', $request->file('foto_prewedding')->hashName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign7->foto_mempelai_laki) {
                Storage::delete($weddingDesign7->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design7', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign7->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign7->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design7', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign7->music) {
                Storage::delete($weddingDesign7->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design7-music', $request->file('music')->hashName());
        }

        if ($request->hasFile('akad_img')) {
            if ($weddingDesign7->akad_img) {
                Storage::delete($weddingDesign7->akad_img);
            }
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design7', $request->file('akad_img')->hashName());
        }

        // Optional: Update multiple image_cinta jika dibolehkan saat edit
        if ($request->hasFile('image_cinta')) {
            // Hapus data lama jika ingin replace semua
            if ($weddingDesign7->image_cinta) {
                $oldImages = json_decode($weddingDesign7->image_cinta, true);
                foreach ($oldImages as $img) {
                    Storage::delete($img);
                }
            }

            $cintaImages = $request->file('image_cinta');
            $cintaImagesPaths = [];

            foreach ($cintaImages as $quoteImage) {
                $cintaImagesPaths[] = $quoteImage->storeAs('public/wedding-design7', $quoteImage->hashName());
            }

            $data['image_cinta'] = json_encode($cintaImagesPaths);
        }

        $weddingDesign7->update($data);

        return redirect()->route('wedding-design7.index', $informasiDesign7Id)->with('success', 'Data berhasil diperbarui.');
    }


    // Function Controller Direct Transfer

    public function storeDirectTransfer(DirectTransferDesign7FormRequest $request, $informasiDesign7Id)
    {
        $informasiDesign7 = InformasiDesign7::findOrFail($informasiDesign7Id);
        $data = $request->all();

        $data['informasi_design7_id'] = $informasiDesign7->id;

        DirectTransferDesign7::create($data);

        return response()->json(['message' => 'Direct Transfer berhasil ditambahkan.']);
    }

    public function updateDirectTransfer(DirectTransferDesign7FormRequest $request, $id)
    {
        $directTransfer = DirectTransferDesign7::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data);

        return response()->json(['message' => 'Direct Transfer berhasil diubah.']);
    }

    public function destroyDirectTransfer($id)
    {
        $directTransfer = DirectTransferDesign7::findOrFail($id);

        $directTransfer->delete();

        return response()->json(['message' => 'Direct Transfer berhasil dihapus']);
    }


    // Function Controller Kirim Hadiah

    public function storeKirimHadiah(KirimHadiahDesign7FormRequest $request, $informasiDesign7Id)
    {
        $informasiDesign7 = InformasiDesign7::findOrFail($informasiDesign7Id);
        $data = $request->all();
        $data['informasi_design7_id'] = $informasiDesign7->id;

        KirimHadiahDesign7::create($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil ditambahkan.']);
    }

    public function updateKirimHadiah(KirimHadiahDesign7FormRequest $request, $id)
    {
        $kirimHadiah = KirimHadiahDesign7::findOrFail($id);
        $data = $request->all();

        $kirimHadiah->update($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil diubah.']);
    }

    public function destroyKirimHadiah($id)
    {
        $kirimHadiah = KirimHadiahDesign7::findOrFail($id);

        $kirimHadiah->delete();

        return response()->json(['message' => 'Kirim Hadiah berhasil dihapus']);
    }

}
