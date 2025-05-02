<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign5;
use App\Models\WeddingDesign5;
use Illuminate\Http\Request;
use Str;
use Validator;

class NamaUndanganDesign5Controller extends Controller
{
    public function index($weddingDesign5Id)
    {
        // Ambil data WeddingDesign5 beserta relasi InformasiDesign5
        $weddingDesign5 = WeddingDesign5::with('InformasiDesign5')->findOrFail($weddingDesign5Id);

        // Ambil data nama undangan dengan pagination
        $nama_undangan = $weddingDesign5->namaUndangan()->paginate(10);

        // Ambil slug_nama_pasangan
        $slug_nama_pasangan = $weddingDesign5->informasiDesign5->slug_nama_pasangan;

        // Ambil id_weddingdesign5
        $id_weddingdesign5 = $weddingDesign5->informasiDesign5->id_weddingdesign5;

        // Menggunakan regex untuk mendapatkan nomor urut dari id_weddingdesign5 (misalnya: PDT-WDDS5-30052025-0001)
        $matches = [];
        preg_match('/WDDS5-\d{8}-(\d+)/', $id_weddingdesign5, $matches);
        $nomor = $matches[1] ?? '0000'; // hasil akhir: 0001

        // Kirim data ke view
        return view('user-design5.index', [
            'weddingDesign5' => $weddingDesign5,
            'nama_undangan' => $nama_undangan,
            'slug_nama_pasangan' => $slug_nama_pasangan,
            'nomor' => $nomor // Menyertakan nomor yang diformat
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create($weddingDesign5Id)
    {
        $weddingDesign5 = WeddingDesign5::findOrFail($weddingDesign5Id);


        // Pass both `$weddingDesign5Id` and `$idWeddingDesign5` to the view
        return view('user-design5.create', [
            'weddingDesign5' => $weddingDesign5,
        ]);
    }

    public function store(Request $request, $weddingDesign5Id)
    {
        // Definisikan pesan untuk validasi
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'nama_undangan.required' => 'Nama undangan harus diisi.',
        ];

        // Validasi input nama undangan
        $validator = Validator::make($request->all(), [
            'nama_undangan' => 'required|string',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mendapatkan instance weddingDesign5 berdasarkan ID
        $weddingDesign5 = WeddingDesign5::findOrFail($weddingDesign5Id);

        // Memecah nama undangan menjadi array
        $nama_undangans = explode("\n", $request->nama_undangan);

        foreach ($nama_undangans as $nama_undangan) {
            $nama_undangan = trim($nama_undangan);

            $slug_nama_undangan = Str::slug($nama_undangan);

            $data = [
                'nama_undangan' => $nama_undangan,
                'slug_nama_undangan' => $slug_nama_undangan,
            ];

            // Buat instance NamaUndangan
            $namaUndangan = new NamaUndanganDesign5($data);
            // Simpan model NamaUndangan terkait dengan weddingDesign5
            $weddingDesign5->namaUndangan()->save($namaUndangan);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nama-undangan-list5', ['weddingDesign5Id' => $weddingDesign5Id])->with('success', 'Berhasil menambahkan data');
    }


    /**
     * Display the specified resource.
     */
    public function show($id, $weddingdesign5Id)
    {
        $nama_undangan = NamaUndanganDesign5::findOrFail($id);
        return view('user-design5.show', [
            'nama_undangan' => $nama_undangan
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NamaUndanganDesign5::findOrFail($id);
        $weddingDesign5Id = $data->wedding_design5_id;

        // Dapatkan weddingDesign5 berdasarkan ID
        $weddingDesign5 = WeddingDesign5::findOrFail($weddingDesign5Id);

        return view('user-design5.edit', [
            'data' => $data,
            'weddingDesign5' => $weddingDesign5, // Kirimkan variabel ini
            'weddingDesign5Id' => $weddingDesign5Id,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $weddingDesign5Id, string $id)
    {
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
        ];

        $validator = Validator::make($request->all(), [
            'nama_undangan' => 'required|string',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $nama_undangan = NamaUndanganDesign5::findOrFail($id);
        $nama_undangan->nama_undangan = $request->nama_undangan;
        $nama_undangan->slug_nama_undangan = Str::slug($request->nama_undangan);
        $nama_undangan->save();

        return redirect()->route('nama-undangan-list5', $weddingDesign5Id)->with('success', 'Berhasil memperbarui data');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id = null)
    {
        // Hapus data tunggal berdasarkan ID yang diterima
        $data = NamaUndanganDesign5::find($id);
        if ($data) {
            $data->delete();
            // Redirect back to the previous page
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

}
