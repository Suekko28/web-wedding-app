<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectTransfterDesign6FormRequest;
use App\Http\Requests\KirimHadiahDesign6FormRequest;
use App\Http\Requests\PerjalananCintaDesign6FormRequest;
use App\Http\Requests\WeddingDesign6FormRequest;
use App\Models\DirectTransferDesign6;
use App\Models\InformasiDesign6;
use App\Models\KirimHadiahDesign6;
use App\Models\PerjalananCintaDesign6;
use App\Models\WeddingDesign6;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;

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

        $dataDirectTransfer = DirectTransferDesign6::where('informasi_design6_id', $informasiDesign6Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign6::where('informasi_design6_id', $informasiDesign6Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Mengambil data mempelai pria
        $dataMempelaiPria = WeddingDesign6::where('informasi_design6_id', $informasiDesign6Id)->first();


        $zonaWaktuOptions = [
            1 => 'WIB',
            2 => 'WIT',
            3 => 'WITA',
        ];


        // Kirimkan data yang sesuai ke view
        return view('admin-design6.create', compact('informasiDesign6Id', 'dataMempelaiPria', 'informasiDesign6', 'dataDirectTransfer', 'dataKirimHadiah', 'zonaWaktuOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign6FormRequest $request, $informasiDesign6Id)
    {
        // Cek apakah InformasiDesign6 sudah ada
        $informasiDesign6 = InformasiDesign6::findOrFail($informasiDesign6Id);
        $data = $request->all();

        // Default values
        $defaultJudulPembuka = 'Assalamu’alaikum Wr. Wb.';
        $defaultJudulJadwal = "Jadwal Pernikahan";
        $defaultJudulPerjalananCinta = 'Perjalanan Cinta Kami';
        $defaultDeskripsiPembuka = "Tanpa mengurangi rasa hormat\nkami mengundang Bapak/Ibu/Saudara/i\npada pernikahan kami:";
        $defaultDeskripsiPenutup = "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do’a restu. Atas kehadiran dan do’a restunya kami ucapkan terima kasih. Kami yang berbahagia";
        $defaultJudulAkad = "Akad";
        $defaultJudulResepsi = "Resepsi";
        $defaultNamaPenutup = $informasiDesign6->nama_pasangan;


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
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design6', $request->file('banner_img')->hashName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design6', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design6', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design6-music', $request->file('music')->hashName());
        }


        if ($request->hasFile('akad_img')) {
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design6', $request->file(key: 'akad_img')->hashName());
        }

        if ($request->hasFile('image_cinta')) {
            $cintaImages = $request->file('image_cinta');
            $cintaImagesPaths = [];

            foreach ($cintaImages as $quoteImage) {
                $cintaImagesPaths[] = $quoteImage->storeAs('public/wedding-design6', $quoteImage->hashName());
            }

            $data['image_cinta'] = json_encode($cintaImagesPaths); // Store paths as a JSON array or adjust according to your needs
        }

        $data['informasi_design6_id'] = $informasiDesign6->id;

        WeddingDesign6::create($data);



        return redirect()->route('wedding-design6.index', $informasiDesign6Id)->with('success', 'Berhasil menambahkan data');

    }

    public function show(string $id)
    {
        $data = WeddingDesign6::findOrFail($id);

        $informasiDesign6 = InformasiDesign6::findOrFail($data->informasi_design6_id);

        $nama_undangan = $data->namaUndangan;

        $dataDirectTransfer = DirectTransferDesign6::where('informasi_design6_id', $informasiDesign6->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign6::where('informasi_design6_id', $informasiDesign6->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $zonaWaktuOptions = [
            1 => 'WIB',
            2 => 'WIT',
            3 => 'WITA',
        ];


        // Pass all the necessary data to the view
        return view('admin-design6.show', [
            'data' => $data,
            'informasiDesign6' => $informasiDesign6,
            'dataDirectTransfer' => $dataDirectTransfer,
            'dataKirimHadiah' => $dataKirimHadiah,
            'nama_undangan' => $nama_undangan,
            'zonaWaktuOptions' => $zonaWaktuOptions
        ]);
    }



    public function edit($informasiDesign6Id, $id)
    {
        $data = WeddingDesign6::findOrFail($id);
        $informasiDesign6 = InformasiDesign6::findOrFail($informasiDesign6Id);

        $dataDirectTransfer = DirectTransferDesign6::where('informasi_design6_id', $informasiDesign6Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign6::where('informasi_design6_id', $informasiDesign6Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $zonaWaktuOptions = [
            1 => 'WIB',
            2 => 'WIT',
            3 => 'WITA',
        ];

        return view('admin-design6.edit', compact('data', 'informasiDesign6', 'dataDirectTransfer', 'dataKirimHadiah', 'zonaWaktuOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeddingDesign6FormRequest $request, $informasiDesign6Id, $id)
    {
        $weddingDesign6 = WeddingDesign6::findOrFail($id);
        $informasiDesign6 = InformasiDesign6::findOrFail($informasiDesign6Id);
        $data = $request->all();


        // Default values
        $defaultJudulPembuka = 'Assalamu’alaikum Wr. Wb.';
        $defaultJudulJadwal = "Jadwal Pernikahan";
        $defaultJudulPerjalananCinta = 'Perjalanan Cinta Kami';
        $defaultDeskripsiPembuka = "Tanpa mengurangi rasa hormat\nkami mengundang Bapak/Ibu/Saudara/i\npada pernikahan kami:";
        $defaultDeskripsiPenutup = "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do’a restu. Atas kehadiran dan do’a restunya kami ucapkan terima kasih. Kami yang berbahagia";
        $defaultJudulAkad = "Akad";
        $defaultJudulResepsi = "Resepsi";
        $defaultNamaPenutup = $informasiDesign6->nama_pasangan;


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
            if ($weddingDesign6->banner_img) {
                Storage::delete($weddingDesign6->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design6', $request->file('banner_img')->hashName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign6->foto_mempelai_laki) {
                Storage::delete($weddingDesign6->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design6', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign6->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign6->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design6', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign6->music) {
                Storage::delete($weddingDesign6->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design6-music', $request->file('music')->hashName());
        }

        if ($request->hasFile('akad_img')) {
            if ($weddingDesign6->akad_img) {
                Storage::delete($weddingDesign6->akad_img);
            }
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design6', $request->file('akad_img')->hashName());
        }

        // Optional: Update multiple image_cinta jika dibolehkan saat edit
        if ($request->hasFile('image_cinta')) {
            // Hapus data lama jika ingin replace semua
            if ($weddingDesign6->image_cinta) {
                $oldImages = json_decode($weddingDesign6->image_cinta, true);
                foreach ($oldImages as $img) {
                    Storage::delete($img);
                }
            }

            $cintaImages = $request->file('image_cinta');
            $cintaImagesPaths = [];

            foreach ($cintaImages as $quoteImage) {
                $cintaImagesPaths[] = $quoteImage->storeAs('public/wedding-design6', $quoteImage->hashName());
            }

            $data['image_cinta'] = json_encode($cintaImagesPaths);
        }

        $weddingDesign6->update($data);

        return redirect()->route('wedding-design6.index', $informasiDesign6Id)->with('success', 'Data berhasil diperbarui.');
    }


    // Function Controller Direct Transfer

    public function storeDirectTransfer(DirectTransfterDesign6FormRequest $request, $informasiDesign6Id)
    {
        $informasiDesign6 = InformasiDesign6::findOrFail($informasiDesign6Id);
        $data = $request->all();

        $data['informasi_design6_id'] = $informasiDesign6->id;

        DirectTransferDesign6::create($data);

        return response()->json(['message' => 'Direct Transfer berhasil ditambahkan.']);
    }

    public function updateDirectTransfer(DirectTransfterDesign6FormRequest $request, $id)
    {
        $directTransfer = DirectTransferDesign6::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data);

        return response()->json(['message' => 'Direct Transfer berhasil diubah.']);
    }

    public function destroyDirectTransfer($id)
    {
        $directTransfer = DirectTransferDesign6::findOrFail($id);

        $directTransfer->delete();

        return response()->json(['message' => 'Direct Transfer berhasil dihapus']);
    }


    // Function Controller Kirim Hadiah

    public function storeKirimHadiah(KirimHadiahDesign6FormRequest $request, $informasiDesign6Id)
    {
        $informasiDesign6 = InformasiDesign6::findOrFail($informasiDesign6Id);
        $data = $request->all();
        $data['informasi_design6_id'] = $informasiDesign6->id;

        KirimHadiahDesign6::create($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil ditambahkan.']);
    }

    public function updateKirimHadiah(KirimHadiahDesign6FormRequest $request, $id)
    {
        $kirimHadiah = KirimHadiahDesign6::findOrFail($id);
        $data = $request->all();

        $kirimHadiah->update($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil diubah.']);
    }

    public function destroyKirimHadiah($id)
    {
        $kirimHadiah = KirimHadiahDesign6::findOrFail($id);

        $kirimHadiah->delete();

        return response()->json(['message' => 'Kirim Hadiah berhasil dihapus']);
    }
}
