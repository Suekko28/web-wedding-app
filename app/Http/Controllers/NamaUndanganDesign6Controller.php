<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign6;
use App\Models\WeddingDesign6;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class NamaUndanganDesign6Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($weddingDesign6Id)
    {
        // Ambil data WeddingDesign6 beserta relasi InformasiDesign6
        $weddingDesign6 = WeddingDesign6::with('InformasiDesign6')->findOrFail($weddingDesign6Id);

        // Ambil data nama undangan dengan pagination
        $nama_undangan = $weddingDesign6->namaUndangan()->paginate(10);

        // Ambil slug_nama_pasangan
        $slug_nama_pasangan = $weddingDesign6->informasiDesign6->slug_nama_pasangan;

        // Ambil id_weddingdesign6
        $id_weddingdesign6 = $weddingDesign6->informasiDesign6->id_weddingdesign6;

        // Menggunakan regex untuk mendapatkan nomor urut dari id_weddingdesign6 (misalnya: PDT-WDDS6-30062025-0001)
        $matches = [];
        preg_match('/WDDS6-\d{8}-(\d+)/', $id_weddingdesign6, $matches);
        $nomor = $matches[1] ?? '0000'; // hasil akhir: 0001

        // Kirim data ke view
        return view('user-design6.index', [
            'weddingDesign6' => $weddingDesign6,
            'nama_undangan' => $nama_undangan,
            'slug_nama_pasangan' => $slug_nama_pasangan,
            'nomor' => $nomor // Menyertakan nomor yang diformat
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create($weddingDesign6Id)
    {
        $weddingDesign6 = WeddingDesign6::findOrFail($weddingDesign6Id);


        // Pass both `$weddingDesign6Id` and `$idWeddingDesign6` to the view
        return view('user-design6.create', [
            'weddingDesign6' => $weddingDesign6,
        ]);
    }

    public function store(Request $request, $weddingDesign6Id)
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

        // Mendapatkan instance weddingDesign6 berdasarkan ID
        $weddingDesign6 = WeddingDesign6::findOrFail($weddingDesign6Id);

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
            $namaUndangan = new NamaUndanganDesign6($data);
            // Simpan model NamaUndangan terkait dengan weddingDesign6
            $weddingDesign6->namaUndangan()->save($namaUndangan);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nama-undangan-list6', ['weddingDesign6Id' => $weddingDesign6Id])->with('success', 'Berhasil menambahkan data');
    }


    /**
     * Display the specified resource.
     */
    public function show($id, $weddingdesign6Id)
    {
        $nama_undangan = NamaUndanganDesign6::findOrFail($id);
        return view('user-design6.show', [
            'nama_undangan' => $nama_undangan
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NamaUndanganDesign6::findOrFail($id);
        $weddingDesign6Id = $data->wedding_design6_id;

        // Dapatkan weddingDesign6 berdasarkan ID
        $weddingDesign6 = WeddingDesign6::findOrFail($weddingDesign6Id);

        return view('user-design6.edit', [
            'data' => $data,
            'weddingDesign6' => $weddingDesign6, // Kirimkan variabel ini
            'weddingDesign6Id' => $weddingDesign6Id,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $weddingDesign6Id, string $id)
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

        $nama_undangan = NamaUndanganDesign6::findOrFail($id);
        $nama_undangan->nama_undangan = $request->nama_undangan;
        $nama_undangan->slug_nama_undangan = Str::slug($request->nama_undangan);
        $nama_undangan->save();

        return redirect()->route('nama-undangan-list6', $weddingDesign6Id)->with('success', 'Berhasil memperbarui data');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id = null)
    {
        // Hapus data tunggal berdasarkan ID yang diterima
        $data = NamaUndanganDesign6::find($id);
        if ($data) {
            $data->delete();
            // Redirect back to the previous page
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
