<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign10;
use App\Models\WeddingDesign10;
use Illuminate\Http\Request;
use Str;
use Validator;

class NamaUndanganDesign10Controller extends Controller
{
    public function index($weddingDesign10Id)
    {
        // Ambil data WeddingDesign10 beserta relasi InformasiDesign10
        $weddingDesign10 = WeddingDesign10::with('InformasiDesign10')->findOrFail($weddingDesign10Id);

        // Ambil data nama undangan dengan pagination
        $nama_undangan = $weddingDesign10->namaUndangan()->paginate(10);

        // Ambil slug_nama_pasangan
        $slug_nama_pasangan = $weddingDesign10->informasiDesign10->slug_nama_pasangan;

        // Ambil id_weddingdesign10 (contoh: PDT-WDDS10-30042025-0001)
        $id_weddingdesign10 = $weddingDesign10->informasiDesign10->id_weddingdesign10;

        // Ambil hanya angka 0001 dari bagian akhir id_weddingdesign10
        $matches = [];
        preg_match('/PDT-WDDS10-\d{8}-(\d+)/', $id_weddingdesign10, $matches);
        $nomor = $matches[1] ?? '0000'; // hasil akhir: 0001

        // Kirim data ke view
        return view('user-design10.index', [
            'weddingDesign10' => $weddingDesign10,
            'nama_undangan' => $nama_undangan,
            'slug_nama_pasangan' => $slug_nama_pasangan,
            'nomor' => $nomor
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create($weddingDesign10Id)
    {
        $weddingDesign10 = WeddingDesign10::findOrFail($weddingDesign10Id);


        // Pass both `$weddingDesign10Id` and `$idWeddingDesign10` to the view
        return view('user-design10.create', [
            'weddingDesign10' => $weddingDesign10,
        ]);
    }

    public function store(Request $request, $weddingDesign10Id)
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

        // Mendapatkan instance weddingDesign10 berdasarkan ID
        $weddingDesign10 = WeddingDesign10::findOrFail($weddingDesign10Id);

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
            $namaUndangan = new NamaUndanganDesign10($data);
            // Simpan model NamaUndangan terkait dengan weddingDesign10
            $weddingDesign10->namaUndangan()->save($namaUndangan);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nama-undangan-list10', ['weddingDesign10Id' => $weddingDesign10Id])->with('success', 'Berhasil menambahkan data');
    }


    /**
     * Display the specified resource.
     */
    public function show($id, $weddingdesign10Id)
    {
        $nama_undangan = NamaUndanganDesign10::findOrFail($id);
        return view('user-design10.show', [
            'nama_undangan' => $nama_undangan
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NamaUndanganDesign10::findOrFail($id);
        $weddingDesign10Id = $data->wedding_design10_id;

        // Dapatkan weddingDesign10 berdasarkan ID
        $weddingDesign10 = WeddingDesign10::findOrFail($weddingDesign10Id);

        return view('user-design10.edit', [
            'data' => $data,
            'weddingDesign10' => $weddingDesign10, // Kirimkan variabel ini
            'weddingDesign10Id' => $weddingDesign10Id,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $weddingDesign10Id, string $id)
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

        $nama_undangan = NamaUndanganDesign10::findOrFail($id);
        $nama_undangan->nama_undangan = $request->nama_undangan;
        $nama_undangan->slug_nama_undangan = Str::slug($request->nama_undangan);
        $nama_undangan->save();

        return redirect()->route('nama-undangan-list10', $weddingDesign10Id)->with('success', 'Berhasil memperbarui data');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id = null)
    {
        // Hapus data tunggal berdasarkan ID yang diterima
        $data = NamaUndanganDesign10::find($id);
        if ($data) {
            $data->delete();
            // Redirect back to the previous page
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

}
