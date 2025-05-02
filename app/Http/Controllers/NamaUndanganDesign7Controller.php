<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign7;
use App\Models\WeddingDesign7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class NamaUndanganDesign7Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($weddingDesign7Id)
    {
        // Ambil data WeddingDesign7 beserta relasi InformasiDesign7
        $weddingDesign7 = WeddingDesign7::with('InformasiDesign7')->findOrFail($weddingDesign7Id);

        // Ambil data nama undangan dengan pagination
        $nama_undangan = $weddingDesign7->namaUndangan()->paginate(10);

        // Ambil slug_nama_pasangan
        $slug_nama_pasangan = $weddingDesign7->informasiDesign7->slug_nama_pasangan;

        // Ambil id_weddingdesign7 (contoh: PDT-WDDS7-30042025-0001)
        $id_weddingdesign7 = $weddingDesign7->informasiDesign7->id_weddingdesign7;

        // Ambil hanya angka 0001 dari bagian akhir id_weddingdesign7
        $matches = [];
        preg_match('/PDT-WDDS7-\d{8}-(\d+)/', $id_weddingdesign7, $matches);
        $nomor = $matches[1] ?? '0000'; // hasil akhir: 0001

        // Kirim data ke view
        return view('user-design7.index', [
            'weddingDesign7' => $weddingDesign7,
            'nama_undangan' => $nama_undangan,
            'slug_nama_pasangan' => $slug_nama_pasangan,
            'nomor' => $nomor
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create($weddingDesign7Id)
    {
        $weddingDesign7 = WeddingDesign7::findOrFail($weddingDesign7Id);


        // Pass both `$weddingDesign7Id` and `$idWeddingDesign7` to the view
        return view('user-design7.create', [
            'weddingDesign7' => $weddingDesign7,
        ]);
    }

    public function store(Request $request, $weddingDesign7Id)
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

        // Mendapatkan instance weddingDesign7 berdasarkan ID
        $weddingDesign7 = WeddingDesign7::findOrFail($weddingDesign7Id);

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
            $namaUndangan = new NamaUndanganDesign7($data);
            // Simpan model NamaUndangan terkait dengan weddingDesign7
            $weddingDesign7->namaUndangan()->save($namaUndangan);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nama-undangan-list7', ['weddingDesign7Id' => $weddingDesign7Id])->with('success', 'Berhasil menambahkan data');
    }


    /**
     * Display the specified resource.
     */
    public function show($id, $weddingdesign7Id)
    {
        $nama_undangan = NamaUndanganDesign7::findOrFail($id);
        return view('user-design7.show', [
            'nama_undangan' => $nama_undangan
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NamaUndanganDesign7::findOrFail($id);
        $weddingDesign7Id = $data->wedding_design7_id;

        // Dapatkan weddingDesign7 berdasarkan ID
        $weddingDesign7 = WeddingDesign7::findOrFail($weddingDesign7Id);

        return view('user-design7.edit', [
            'data' => $data,
            'weddingDesign7' => $weddingDesign7, // Kirimkan variabel ini
            'weddingDesign7Id' => $weddingDesign7Id,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $weddingDesign7Id, string $id)
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

        $nama_undangan = NamaUndanganDesign7::findOrFail($id);
        $nama_undangan->nama_undangan = $request->nama_undangan;
        $nama_undangan->slug_nama_undangan = Str::slug($request->nama_undangan);
        $nama_undangan->save();

        return redirect()->route('nama-undangan-list7', $weddingDesign7Id)->with('success', 'Berhasil memperbarui data');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id = null)
    {
        // Hapus data tunggal berdasarkan ID yang diterima
        $data = NamaUndanganDesign7::find($id);
        if ($data) {
            $data->delete();
            // Redirect back to the previous page
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

}
