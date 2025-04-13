<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign9;
use App\Models\WeddingDesign9;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NamaUndanganDesign9Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($weddingDesign9Id)
    {
        $weddingDesign9 = WeddingDesign9::findOrFail($weddingDesign9Id);
        $nama_undangan = $weddingDesign9->namaUndangan()->paginate(10);

        return view('user-design9.index', [
            'weddingDesign9' => $weddingDesign9,
            'nama_undangan' => $nama_undangan,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create($weddingDesign9Id)
    {
        $weddingDesign9 = WeddingDesign9::findOrFail($weddingDesign9Id);


        // Pass both `$weddingDesign9Id` and `$idWeddingDesign9` to the view
        return view('user-design9.create', [
            'weddingDesign9' => $weddingDesign9,
        ]);
    }

    public function store(Request $request, $weddingDesign9Id)
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

        // Mendapatkan instance weddingDesign9 berdasarkan ID
        $weddingDesign9 = WeddingDesign9::findOrFail($weddingDesign9Id);

        // Memecah nama undangan menjadi array
        $nama_undangans = explode("\n", $request->nama_undangan);

        foreach ($nama_undangans as $nama_undangan) {
            $nama_undangan = trim($nama_undangan);

            $data = [
                'nama_undangan' => $nama_undangan,
            ];

            // Buat instance NamaUndangan
            $namaUndangan = new NamaUndanganDesign9($data);
            // Simpan model NamaUndangan terkait dengan weddingDesign9
            $weddingDesign9->namaUndangan()->save($namaUndangan);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nama-undangan-list9', ['weddingDesign9Id' => $weddingDesign9Id])->with('success', 'Berhasil menambahkan data');
    }


    /**
     * Display the specified resource.
     */
    public function show($id, $weddingDesign9Id)
    {
        $nama_undangan = NamaUndanganDesign9::findOrFail($id);
        return view('user-design9.show', [
            'nama_undangan' => $nama_undangan
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NamaUndanganDesign9::findOrFail($id);
        $weddingDesign9Id = $data->wedding_design9_id;

        // Dapatkan weddingDesign9 berdasarkan ID
        $weddingDesign9 = WeddingDesign9::findOrFail($weddingDesign9Id);

        return view('user-design9.edit', [
            'data' => $data,
            'weddingDesign9' => $weddingDesign9, // Kirimkan variabel ini
            'weddingDesign9Id' => $weddingDesign9Id,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $weddingDesign9Id, string $id)
    {
        // Mendapatkan instance NamaUndangan berdasarkan ID
        $nama_undangan = NamaUndanganDesign9::findOrFail($id);

        // Update nama undangan
        $nama_undangan->nama_undangan = $request->nama_undangan;

        // Simpan perubahan
        $nama_undangan->save();

        // Redirect ke halaman list dengan pesan sukses
        return redirect()->route('nama-undangan-list9', $weddingDesign9Id)->with('success', 'Berhasil memperbarui data');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id = null)
    {
        // Hapus data tunggal berdasarkan ID yang diterima
        $data = NamaUndanganDesign9::find($id);
        if ($data) {
            $data->delete();
            // Redirect back to the previous page
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

}
