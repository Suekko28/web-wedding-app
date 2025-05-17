<?php

namespace App\Http\Controllers;

use App\Http\Requests\DirectTransferDesign10FormRequest;
use App\Http\Requests\DresscodeDesign10FormRequest;
use App\Http\Requests\KirimHadiahDesign10FormRequest;
use App\Http\Requests\WeddingDesign10FormRequest;
use App\Models\DirectTransferDesign10;
use App\Models\DresscodeDesign10;
use App\Models\InformasiDesign10;
use App\Models\KirimHadiahDesign10;
use App\Models\WeddingDesign10;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WeddignDesign10Controller extends Controller
{
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($informasiDesign10Id)
    {
        $informasiDesign10 = InformasiDesign10::findOrFail($informasiDesign10Id);

        $dataDirectTransfer = DirectTransferDesign10::where('informasi_design10_id', $informasiDesign10Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign10::where('informasi_design10_id', $informasiDesign10Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDresscode = DresscodeDesign10::where('informasi_design10_id', $informasiDesign10Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        // Mengambil data mempelai pria
        $dataMempelaiPria = WeddingDesign10::where('informasi_design10_id', $informasiDesign10Id)->first();


        $zonaWaktuOptions = [
            1 => 'WIB',
            2 => 'WIT',
            3 => 'WITA',
        ];


        // Kirimkan data yang sesuai ke view
        return view('admin-design10.create', compact('informasiDesign10Id', 'dataMempelaiPria', 'informasiDesign10', 'dataDirectTransfer', 'dataKirimHadiah', 'zonaWaktuOptions', 'dataDresscode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign10FormRequest $request, $informasiDesign10Id)
    {
        // Cek apakah InformasiDesign10 sudah ada
        $informasiDesign10 = InformasiDesign10::findOrFail($informasiDesign10Id);
        $data = $request->all();

        // Default values
        $defaultJudulPembuka = 'Assalamu’alaikum Wr. Wb.';
        $defaultJudulJadwal = "Hari Bahagia Kami";
        $defaultJudulDresscode = 'Dresscode Kami';
        $defaultDeskripsiPembuka = "Tanpa mengurangi rasa hormat\nkami mengundang Bapak/Ibu/Saudara/i\npada pernikahan kami:";
        $defaultDeskripsiPenutup = "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do’a restu. Atas kehadiran dan do’a restunya kami ucapkan terima kasih. Kami yang berbahagia";
        $defaultJudulAkad = "Akad";
        $defaultJudulResepsi = "Resepsi";
        $defaultNamaPenutup = $informasiDesign10->nama_pasangan;


        // Cek dan set default jika tidak ada input / sama
        $data['judul_pembuka'] = $request->filled('judul_pembuka') ? $request->input('judul_pembuka') : $defaultJudulPembuka;
        $data['judul_jadwal'] = $request->filled('judul_jadwal') ? $request->input('judul_jadwal') : $defaultJudulJadwal;
        $data['deskripsi_pembuka'] = $request->filled('deskripsi_pembuka') ? $request->input('deskripsi_pembuka') : $defaultDeskripsiPembuka;
        $data['judul_cinta'] = $request->filled('judul_cinta') ? $request->input('judul_cinta') : $defaultJudulDresscode;
        $data['deskripsi_cinta'] = $request->filled('deskripsi_cinta') ? $request->input('deskripsi_cinta') : $defaultDeskripsiPembuka;
        $data['deskripsi_penutup'] = $request->filled('deskripsi_penutup') ? $request->input('deskripsi_penutup') : $defaultDeskripsiPenutup;
        $data['judul_akad'] = $request->filled('judul_akad') ? $request->input('judul_akad') : $defaultJudulAkad;
        $data['judul_resepsi'] = $request->filled('judul_resepsi') ? $request->input('judul_resepsi') : $defaultJudulResepsi;
        $data['nama_penutup'] = $request->filled('nama_penutup') ? $request->input('nama_penutup') : $defaultNamaPenutup;


        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design10', $request->file('banner_img')->hashName());
        }

        if ($request->hasFile('foto_prewedding')) {
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design10', $request->file('foto_prewedding')->hashName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design10', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design10', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design10-music', $request->file('music')->hashName());
        }


        if ($request->hasFile('akad_img')) {
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design10', $request->file(key: 'akad_img')->hashName());
        }

        if ($request->hasFile('image_cinta')) {
            $cintaImages = $request->file('image_cinta');
            $cintaImagesPaths = [];

            foreach ($cintaImages as $quoteImage) {
                $cintaImagesPaths[] = $quoteImage->storeAs('public/wedding-design10', $quoteImage->hashName());
            }

            $data['image_cinta'] = json_encode($cintaImagesPaths); // Store paths as a JSON array or adjust according to your needs
        }

        if ($request->hasFile('image_hero')) {
            $heroImages = $request->file('image_hero');
            $heroImagesPaths = [];

            foreach ($heroImages as $quoteImage) {
                $heroImagesPaths[] = $quoteImage->storeAs('public/wedding-design10', $quoteImage->hashName());
            }

            $data['image_hero'] = json_encode($heroImagesPaths); // Store paths as a JSON array or adjust according to your needs
        }

        $data['informasi_design10_id'] = $informasiDesign10->id;

        WeddingDesign10::create($data);



        return redirect()->route('wedding-design10.index', $informasiDesign10Id)->with('success', 'Berhasil menambahkan data');

    }

    public function show(string $id)
    {
        $data = WeddingDesign10::findOrFail($id);

        $informasiDesign10 = InformasiDesign10::findOrFail($data->informasi_design10_id);

        $nama_undangan = $data->namaUndangan;

        $dataDirectTransfer = DirectTransferDesign10::where('informasi_design10_id', $informasiDesign10->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign10::where('informasi_design10_id', $informasiDesign10->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDresscode = DresscodeDesign10::where('informasi_design10_id', $informasiDesign10->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $zonaWaktuOptions = [
            1 => 'WIB',
            2 => 'WIT',
            3 => 'WITA',
        ];


        // Pass all the necessary data to the view
        return view('admin-design10.show', [
            'data' => $data,
            'informasiDesign10' => $informasiDesign10,
            'dataDirectTransfer' => $dataDirectTransfer,
            'dataKirimHadiah' => $dataKirimHadiah,
            'nama_undangan' => $nama_undangan,
            'zonaWaktuOptions' => $zonaWaktuOptions,
            'dataDresscode' => $dataDresscode,
        ]);
    }



    public function edit($informasiDesign10Id, $id)
    {
        $data = WeddingDesign10::findOrFail($id);
        $informasiDesign10 = InformasiDesign10::findOrFail($informasiDesign10Id);

        $dataDirectTransfer = DirectTransferDesign10::where('informasi_design10_id', $informasiDesign10Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataKirimHadiah = KirimHadiahDesign10::where('informasi_design10_id', $informasiDesign10Id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $dataDresscode = DresscodeDesign10::where('informasi_design10_id', $informasiDesign10->id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        $zonaWaktuOptions = [
            1 => 'WIB',
            2 => 'WIT',
            3 => 'WITA',
        ];

        return view('admin-design10.edit', compact('data', 'informasiDesign10', 'dataDirectTransfer', 'dataKirimHadiah', 'zonaWaktuOptions', 'dataDresscode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeddingDesign10FormRequest $request, $informasiDesign10Id, $id)
    {
        $weddingDesign10 = WeddingDesign10::findOrFail($id);
        $informasiDesign10 = InformasiDesign10::findOrFail($informasiDesign10Id);
        $data = $request->all();


        // Default values
        $defaultJudulPembuka = 'Assalamu’alaikum Wr. Wb.';
        $defaultJudulJadwal = "Hari Bahagia Kami";
        $defaultJudulDresscode = 'Dresscode Kami';
        $defaultDeskripsiPembuka = "Tanpa mengurangi rasa hormat\nkami mengundang Bapak/Ibu/Saudara/i\npada pernikahan kami:";
        $defaultDeskripsiPenutup = "Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan do’a restu. Atas kehadiran dan do’a restunya kami ucapkan terima kasih. Kami yang berbahagia";
        $defaultJudulAkad = "Akad";
        $defaultJudulResepsi = "Resepsi";
        $defaultNamaPenutup = $informasiDesign10->nama_pasangan;


        // Cek dan set default jika tidak ada input / sama
        $data['judul_pembuka'] = $request->filled('judul_pembuka') ? $request->input('judul_pembuka') : $defaultJudulPembuka;
        $data['judul_jadwal'] = $request->filled('judul_jadwal') ? $request->input('judul_jadwal') : $defaultJudulJadwal;
        $data['deskripsi_pembuka'] = $request->filled('deskripsi_pembuka') ? $request->input('deskripsi_pembuka') : $defaultDeskripsiPembuka;
        $data['judul_cinta'] = $request->filled('judul_cinta') ? $request->input('judul_cinta') : $defaultJudulDresscode;
        $data['deskripsi_cinta'] = $request->filled('deskripsi_cinta') ? $request->input('deskripsi_cinta') : $defaultDeskripsiPembuka;
        $data['deskripsi_penutup'] = $request->filled('deskripsi_penutup') ? $request->input('deskripsi_penutup') : $defaultDeskripsiPenutup;
        $data['judul_akad'] = $request->filled('judul_akad') ? $request->input('judul_akad') : $defaultJudulAkad;
        $data['judul_resepsi'] = $request->filled('judul_resepsi') ? $request->input('judul_resepsi') : $defaultJudulResepsi;
        $data['nama_penutup'] = $request->filled('nama_penutup') ? $request->input('nama_penutup') : $defaultNamaPenutup;

        // Handle file uploads & delete old files
        if ($request->hasFile('banner_img')) {
            if ($weddingDesign10->banner_img) {
                Storage::delete($weddingDesign10->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design10', $request->file('banner_img')->hashName());
        }

        if ($request->hasFile('foto_prewedding')) {
            if ($weddingDesign10->foto_prewedding) {
                Storage::delete($weddingDesign10->foto_prewedding);
            }
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design10', $request->file('foto_prewedding')->hashName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign10->foto_mempelai_laki) {
                Storage::delete($weddingDesign10->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design10', $request->file('foto_mempelai_laki')->hashName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign10->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign10->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design10', $request->file('foto_mempelai_perempuan')->hashName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign10->music) {
                Storage::delete($weddingDesign10->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design10-music', $request->file('music')->hashName());
        }

        if ($request->hasFile('akad_img')) {
            if ($weddingDesign10->akad_img) {
                Storage::delete($weddingDesign10->akad_img);
            }
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design10', $request->file('akad_img')->hashName());
        }

        // Optional: Update multiple image_cinta jika dibolehkan saat edit
        if ($request->hasFile('image_cinta')) {
            // Hapus data lama jika ingin replace semua
            if ($weddingDesign10->image_cinta) {
                $oldImages = json_decode($weddingDesign10->image_cinta, true);
                foreach ($oldImages as $img) {
                    Storage::delete($img);
                }
            }

            $cintaImages = $request->file('image_cinta');
            $cintaImagesPaths = [];

            foreach ($cintaImages as $quoteImage) {
                $cintaImagesPaths[] = $quoteImage->storeAs('public/wedding-design10', $quoteImage->hashName());
            }

            $data['image_cinta'] = json_encode($cintaImagesPaths);
        }

        if ($request->hasFile('image_hero')) {
            // Hapus data lama jika ingin replace semua
            if ($weddingDesign10->image_hero) {
                $oldImages = json_decode($weddingDesign10->image_hero, true);
                foreach ($oldImages as $img) {
                    Storage::delete($img);
                }
            }

            $heroImages = $request->file('image_hero');
            $heroImagesPaths = [];

            foreach ($heroImages as $quoteImage) {
                $heroImagesPaths[] = $quoteImage->storeAs('public/wedding-design10', $quoteImage->hashName());
            }

            $data['image_hero'] = json_encode($heroImagesPaths);
        }


        $weddingDesign10->update($data);

        return redirect()->route('wedding-design10.index', $informasiDesign10Id)->with('success', 'Data berhasil diperbarui.');
    }


    // Function Controller Direct Transfer

    public function storeDirectTransfer(DirectTransferDesign10FormRequest $request, $informasiDesign10Id)
    {
        $informasiDesign10 = InformasiDesign10::findOrFail($informasiDesign10Id);
        $data = $request->all();

        $data['informasi_design10_id'] = $informasiDesign10->id;

        DirectTransferDesign10::create($data);

        return response()->json(['message' => 'Direct Transfer berhasil ditambahkan.']);
    }

    public function updateDirectTransfer(DirectTransferDesign10FormRequest $request, $id)
    {
        $directTransfer = DirectTransferDesign10::findOrFail($id);
        $data = $request->all();

        $directTransfer->update($data);

        return response()->json(['message' => 'Direct Transfer berhasil diubah.']);
    }

    public function destroyDirectTransfer($id)
    {
        $directTransfer = DirectTransferDesign10::findOrFail($id);

        $directTransfer->delete();

        return response()->json(['message' => 'Direct Transfer berhasil dihapus']);
    }


    // Function Controller Kirim Hadiah

    public function storeKirimHadiah(KirimHadiahDesign10FormRequest $request, $informasiDesign10Id)
    {
        $informasiDesign10 = InformasiDesign10::findOrFail($informasiDesign10Id);
        $data = $request->all();
        $data['informasi_design10_id'] = $informasiDesign10->id;

        KirimHadiahDesign10::create($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil ditambahkan.']);
    }

    public function updateKirimHadiah(KirimHadiahDesign10FormRequest $request, $id)
    {
        $kirimHadiah = KirimHadiahDesign10::findOrFail($id);
        $data = $request->all();

        $kirimHadiah->update($data);

        return response()->json(['message' => 'Kirim Hadiah berhasil diubah.']);
    }

    public function destroyKirimHadiah($id)
    {
        $kirimHadiah = KirimHadiahDesign10::findOrFail($id);

        $kirimHadiah->delete();

        return response()->json(['message' => 'Kirim Hadiah berhasil dihapus']);
    }


    // Function Controller Dresscode

    public function storeDresscode(DresscodeDesign10FormRequest $request, $informasiDesign10Id)
    {
        $informasiDesign10 = InformasiDesign10::findOrFail($informasiDesign10Id);
        $data = $request->all();


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->storeAs('public/wedding-design10/perjalanan-cinta', $request->file('image')->hashName());
        }


        $data['informasi_design10_id'] = $informasiDesign10->id;


        // Create the DresscodeDesign10 record
        DresscodeDesign10::create($data);

        return response()->json(['message' => 'Dresscode berhasil ditambahkan.']);
    }


    public function updateDresscode(DresscodeDesign10FormRequest $request, $id)
    {
        $Dresscode = DresscodeDesign10::findOrFail($id);
        $data = $request->all();

        // Check and handle uploaded image
        if ($request->hasFile('image')) {
            if ($Dresscode->image) {
                Storage::delete($Dresscode->image);
            }
            $data['image'] = $request->file('image')->storeAs('public/wedding-design10/perjalanan-cinta', $request->file('image')->hashName());
        }

        $Dresscode->update($data); // Update model DresscodeDesign10

        return response()->json(['message' => 'Dresscode berhasil diubah']);
    }


    public function destroyDresscode($id)
    {
        $Dresscode = DresscodeDesign10::findOrFail($id);

        $Dresscode->delete();

        return response()->json(['message' => 'Dresscode berhasil dihapus']);
    }

}
