<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectTransferDesign8FormRequest;
use App\Http\Requests\KirimHadiahDesign8FormRequest;
use App\Http\Requests\WeddingDesign8FormRequest;
use App\Models\DirectTransferDesign8;
use App\Models\InformasiDesign8;
use App\Models\KirimHadiahDesign8;
use App\Models\WeddingDesign8;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

class WeddingDesign8Controller extends Controller
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
    public function create($informasiDesign8Id)
    {
        $informasiDesign8 = InformasiDesign8::findOrFail($informasiDesign8Id);

        $dataDirectTransfer = DirectTransferDesign8::where('informasi_design8_id', $informasiDesign8Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign8::where('informasi_design8_id', $informasiDesign8Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Mengambil data mempelai pria
        $dataMempelaiPria = WeddingDesign8::where('informasi_design8_id', $informasiDesign8Id)->first();

        $zonaWaktuOptions = [
            1 => 'WIB',
            2 => 'WIT',
            3 => 'WITA',
        ];
        // Kirimkan data yang sesuai ke view
        return view('admin-design8.create', compact('informasiDesign8Id', 'dataMempelaiPria', 'informasiDesign8', 'dataDirectTransfer', 'dataKirimHadiah', 'zonaWaktuOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign8FormRequest $request, $informasiDesign8Id)
    {
        // Cek apakah InformasiDesign8 sudah ada
        $informasiDesign8 = InformasiDesign8::findOrFail($informasiDesign8Id);
        $data = $request->all();

        // Default values
        $defaultJudulPembuka = 'Assalamu’alaikum Wr. Wb.';
        $defaultJudulJadwal = "Jadwal Pernikahan";
        $defaultJudulPerjalananCinta = 'Perjalanan Cinta Kami';
        $defaultDeskripsiPembuka = "Tanpa mengurangi rasa hormat\nkami mengundang Bapak/Ibu/Saudara/i\npada pernikahan kami:";
        $defaultDeskripsiPenutup = "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do’a restu. Atas kehadiran dan do’a restunya kami ucapkan terima kasih. Kami yang berbahagia";
        $defaultJudulAkad = "Akad";
        $defaultJudulResepsi = "Resepsi";
        $defaultNamaPenutup = $informasiDesign8->nama_pasangan;


        // Cek dan set default jika tidak ada input / sama
        $data['judul_pembuka'] = $request->filled('judul_pembuka') ? $request->input('judul_pembuka') : $defaultJudulPembuka;
        $data['judul_jadwal'] = $request->filled('judul_jadwal') ? $request->input('judul_jadwal') : $defaultJudulJadwal;
        $data['deskripsi_pembuka'] = $request->filled('deskripsi_pembuka') ? $request->input('deskripsi_pembuka') : $defaultDeskripsiPembuka;
        $data['judul_cinta'] = $request->filled('judul_cinta') ? $request->input('judul_cinta') : $defaultJudulPerjalananCinta;
        $data['deskripsi_cinta'] = $request->filled('deskripsi_cinta') ? $request->input('deskripsi_cinta') : $defaultDeskripsiPembuka;
        $data['deskripsi_penutup'] = $request->filled('deskripsi_penutup') ? $request->input('deskripsi_penutup') : $defaultDeskripsiPenutup;
        $data['judul_akad'] = $request->filled('judul_akad') ? $request->input('judul_akad') : $defaultJudulAkad;
        $data['judul_resepsi'] = $request->filled('judul_resepsi') ? $request->input('judul_resepsi') : $defaultJudulResepsi;
        $data['nama_penutup'] = $request->filled('nama_penutup') ? $request->input('nama_penutup') : $defaultNamaPenutup;


        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design8', $request->file('banner_img')->hashName());
        }


        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design8', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design8', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design8-music', $request->file('music')->hashName());
        }


        if ($request->hasFile('akad_img')) {
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design8', $request->file(key: 'akad_img')->hashName());
        }

        if ($request->hasFile('image_cinta')) {
            $cintaImages = $request->file('image_cinta');
            $cintaImagesPaths = [];

            foreach ($cintaImages as $quoteImage) {
                $cintaImagesPaths[] = $quoteImage->storeAs('public/wedding-design8', $quoteImage->hashName());
            }

            $data['image_cinta'] = json_encode($cintaImagesPaths); // Store paths as a JSON array or adjust according to your needs
        }

        $data['informasi_design8_id'] = $informasiDesign8->id;

        WeddingDesign8::create($data);



        return redirect()->route('wedding-design8.index', $informasiDesign8Id)->with('success', 'Berhasil menambahkan data');

    }

    public function show(string $id)
    {
        $data = WeddingDesign8::findOrFail($id);

        $informasiDesign8 = InformasiDesign8::findOrFail($data->informasi_design8_id);

        $nama_undangan = $data->namaUndangan;

        $dataDirectTransfer = DirectTransferDesign8::where('informasi_design8_id', $informasiDesign8->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign8::where('informasi_design8_id', $informasiDesign8->id)
            ->orderBy('id', 'desc')
            ->paginate(10);


        $zonaWaktuOptions = [
            1 => 'WIB',
            2 => 'WIT',
            3 => 'WITA',
        ];

        // Pass all the necessary data to the view
        return view('admin-design8.show', [
            'data' => $data,
            'informasiDesign8' => $informasiDesign8,
            'dataDirectTransfer' => $dataDirectTransfer,
            'dataKirimHadiah' => $dataKirimHadiah,
            'nama_undangan' => $nama_undangan,
            'zonaWaktuOptions' => $zonaWaktuOptions
        ]);
    }



    public function edit($informasiDesign8Id, $id)
    {
        $data = WeddingDesign8::findOrFail($id);
        $informasiDesign8 = InformasiDesign8::findOrFail($informasiDesign8Id);

        $dataDirectTransfer = DirectTransferDesign8::where('informasi_design8_id', $informasiDesign8Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign8::where('informasi_design8_id', $informasiDesign8Id)
            ->orderBy('id', 'desc')
            ->paginate(10);


        $zonaWaktuOptions = [
            1 => 'WIB',
            2 => 'WIT',
            3 => 'WITA',
        ];

        return view('admin-design8.edit', compact('data', 'informasiDesign8', 'dataDirectTransfer', 'dataKirimHadiah', 'zonaWaktuOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeddingDesign8FormRequest $request, $informasiDesign8Id, $id)
    {
        $weddingDesign8 = WeddingDesign8::findOrFail($id);
        $informasiDesign8 = InformasiDesign8::findOrFail($informasiDesign8Id);

        $data = $request->all();

        // Default values
        $defaultJudulPembuka = 'Assalamu’alaikum Wr. Wb.';
        $defaultJudulJadwal = "Jadwal Pernikahan";
        $defaultJudulPerjalananCinta = 'Perjalanan Cinta Kami';
        $defaultDeskripsiPembuka = "Tanpa mengurangi rasa hormat\nkami mengundang Bapak/Ibu/Saudara/i\npada pernikahan kami:";
        $defaultDeskripsiPenutup = "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do’a restu. Atas kehadiran dan do’a restunya kami ucapkan terima kasih. Kami yang berbahagia";
        $defaultJudulAkad = "Akad";
        $defaultJudulResepsi = "Resepsi";
        $defaultNamaPenutup = $informasiDesign8->nama_pasangan;

        // Cek dan set default jika tidak ada input / sama
        $data['judul_pembuka'] = $request->filled('judul_pembuka') ? $request->input('judul_pembuka') : $defaultJudulPembuka;
        $data['judul_jadwal'] = $request->filled('judul_jadwal') ? $request->input('judul_jadwal') : $defaultJudulJadwal;
        $data['deskripsi_pembuka'] = $request->filled('deskripsi_pembuka') ? $request->input('deskripsi_pembuka') : $defaultDeskripsiPembuka;
        $data['judul_cinta'] = $request->filled('judul_cinta') ? $request->input('judul_cinta') : $defaultJudulPerjalananCinta;
        $data['deskripsi_cinta'] = $request->filled('deskripsi_cinta') ? $request->input('deskripsi_cinta') : $defaultDeskripsiPembuka;
        $data['deskripsi_penutup'] = $request->filled('deskripsi_penutup') ? $request->input('deskripsi_penutup') : $defaultDeskripsiPenutup;
        $data['judul_akad'] = $request->filled('judul_akad') ? $request->input('judul_akad') : $defaultJudulAkad;
        $data['judul_resepsi'] = $request->filled('judul_resepsi') ? $request->input('judul_resepsi') : $defaultJudulResepsi;
        $data['nama_penutup'] = $request->filled('nama_penutup') ? $request->input('nama_penutup') : $defaultNamaPenutup;

        // Handle file uploads & delete old files
        if ($request->hasFile('banner_img')) {
            if ($weddingDesign8->banner_img) {
                Storage::delete($weddingDesign8->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design8', $request->file('banner_img')->hashName());
        }


        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign8->foto_mempelai_laki) {
                Storage::delete($weddingDesign8->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design8', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign8->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign8->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design8', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign8->music) {
                Storage::delete($weddingDesign8->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design8-music', $request->file('music')->hashName());
        }

        if ($request->hasFile('akad_img')) {
            if ($weddingDesign8->akad_img) {
                Storage::delete($weddingDesign8->akad_img);
            }
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design8', $request->file('akad_img')->hashName());
        }

        // Optional: Update multiple image_cinta jika dibolehkan saat edit
        if ($request->hasFile('image_cinta')) {
            // Hapus data lama jika ingin replace semua
            if ($weddingDesign8->image_cinta) {
                $oldImages = json_decode($weddingDesign8->image_cinta, true);
                foreach ($oldImages as $img) {
                    Storage::delete($img);
                }
            }

            $cintaImages = $request->file('image_cinta');
            $cintaImagesPaths = [];

            foreach ($cintaImages as $quoteImage) {
                $cintaImagesPaths[] = $quoteImage->storeAs('public/wedding-design8', $quoteImage->hashName());
            }

            $data['image_cinta'] = json_encode($cintaImagesPaths);
        }

        $data['slug_nama_mempelai_laki'] = Str::slug($data['nama_mempelai_laki']);
        $data['slug_nama_mempelai_perempuan'] = Str::slug($data['nama_mempelai_perempuan']);

        $weddingDesign8->update($data);

        return redirect()->route('wedding-design8.index', $informasiDesign8Id)->with('success', 'Data berhasil diperbarui.');
    }


    // Function Controller Direct Transfer

    public function storeDirectTransfer(DirectTransferDesign8FormRequest $request, $informasiDesign8Id)
    {
        $informasiDesign8 = InformasiDesign8::findOrFail($informasiDesign8Id);
        $data = $request->all();

        $data['informasi_design8_id'] = $informasiDesign8->id;

        DirectTransferDesign8::create($data);

        return response()->json(['message' => 'Direct Transfer berhasil ditambahkan.']);
    }

    public function updateDirectTransfer(DirectTransferDesign8FormRequest $request, $id)
    {
        $directTransfer = DirectTransferDesign8::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data);

        return response()->json(['message' => 'Direct Transfer berhasil diubah.']);
    }

    public function destroyDirectTransfer($id)
    {
        $directTransfer = DirectTransferDesign8::findOrFail($id);

        $directTransfer->delete();

        return response()->json(['message' => 'Direct Transfer berhasil dihapus']);
    }


    // Function Controller Kirim Hadiah

    public function storeKirimHadiah(KirimHadiahDesign8FormRequest $request, $informasiDesign8Id)
    {
        $informasiDesign8 = InformasiDesign8::findOrFail($informasiDesign8Id);
        $data = $request->all();
        $data['informasi_design8_id'] = $informasiDesign8->id;

        KirimHadiahDesign8::create($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil ditambahkan.']);
    }

    public function updateKirimHadiah(KirimHadiahDesign8FormRequest $request, $id)
    {
        $kirimHadiah = KirimHadiahDesign8::findOrFail($id);
        $data = $request->all();

        $kirimHadiah->update($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil diubah.']);
    }

    public function destroyKirimHadiah($id)
    {
        $kirimHadiah = KirimHadiahDesign8::findOrFail($id);

        $kirimHadiah->delete();

        return response()->json(['message' => 'Kirim Hadiah berhasil dihapus']);
    }

}
