<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign4;
use App\Models\WeddingDesign4;
use Illuminate\Http\Request;
use Str;
use Validator;

class NamaUndanganDesign4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($weddingDesign4Id)
    {
        $weddingDesign4 = WeddingDesign4::findOrFail($weddingDesign4Id);
        $nama_undangan = $weddingDesign4->namaUndangan()->paginate(10);

        return view('user-design4.index', [
            'weddingDesign4' => $weddingDesign4,
            'nama_undangan' => $nama_undangan,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create($weddingDesign4Id)
    {
        $weddingDesign4 = WeddingDesign4::findOrFail($weddingDesign4Id);


        // Pass both `$weddingDesign4Id` and `$idWeddingDesign4` to the view
        return view('user-design4.create', [
            'weddingDesign4' => $weddingDesign4,
        ]);
    }

    public function store(Request $request, $weddingDesign4Id)
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

        // Mendapatkan instance weddingDesign4 berdasarkan ID
        $weddingDesign4 = WeddingDesign4::findOrFail($weddingDesign4Id);

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
            $namaUndangan = new NamaUndanganDesign4($data);
            // Simpan model NamaUndangan terkait dengan weddingDesign4
            $weddingDesign4->namaUndangan()->save($namaUndangan);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nama-undangan-list4', ['weddingDesign4Id' => $weddingDesign4Id])->with('success', 'Berhasil menambahkan data');
    }


    /**
     * Display the specified resource.
     */
    public function show($id, $weddingdesign4Id)
    {
        $nama_undangan = NamaUndanganDesign4::findOrFail($id);
        return view('user-design4.show', [
            'nama_undangan' => $nama_undangan
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NamaUndanganDesign4::findOrFail($id);
        $weddingDesign4Id = $data->wedding_design4_id;

        // Dapatkan weddingDesign4 berdasarkan ID
        $weddingDesign4 = WeddingDesign4::findOrFail($weddingDesign4Id);

        return view('user-design4.edit', [
            'data' => $data,
            'weddingDesign4' => $weddingDesign4, // Kirimkan variabel ini
            'weddingDesign4Id' => $weddingDesign4Id,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $weddingDesign4Id, string $id)
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

        $nama_undangan = NamaUndanganDesign4::findOrFail($id);
        $nama_undangan->nama_undangan = $request->nama_undangan;
        $nama_undangan->slug_nama_undangan = Str::slug($request->nama_undangan);
        $nama_undangan->save();

        return redirect()->route('nama-undangan-list4', $weddingDesign4Id)->with('success', 'Berhasil memperbarui data');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id = null)
    {
        // Hapus data tunggal berdasarkan ID yang diterima
        $data = NamaUndanganDesign4::find($id);
        if ($data) {
            $data->delete();
            // Redirect back to the previous page
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
