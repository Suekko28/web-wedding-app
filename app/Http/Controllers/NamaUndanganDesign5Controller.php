<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign5;
use App\Models\WeddingDesign5;
use Illuminate\Http\Request;
use Validator;

class NamaUndanganDesign5Controller extends Controller
{
    public function index($weddingDesign5Id)
    {
        $weddingDesign5 = WeddingDesign5::findOrFail($weddingDesign5Id);
        $nama_undangan = $weddingDesign5->namaUndangan()->paginate(10);

        return view('user-design5.index', [
            'weddingDesign5' => $weddingDesign5,
            'nama_undangan' => $nama_undangan,
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

            $data = [
                'nama_undangan' => $nama_undangan,
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
        // Mendapatkan instance NamaUndangan berdasarkan ID
        $nama_undangan = NamaUndanganDesign5::findOrFail($id);

        // Update nama undangan
        $nama_undangan->nama_undangan = $request->nama_undangan;

        // Simpan perubahan
        $nama_undangan->save();

        // Redirect ke halaman list dengan pesan sukses
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
