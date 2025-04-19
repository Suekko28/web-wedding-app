<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign7;
use App\Models\WeddingDesign7;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NamaUndanganDesign7Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($weddingDesign7Id)
    {
        $weddingDesign7 = WeddingDesign7::findOrFail($weddingDesign7Id);
        $nama_undangan = $weddingDesign7->namaUndangan()->paginate(10);

        return view('user-design7.index', [
            'weddingDesign7' => $weddingDesign7,
            'nama_undangan' => $nama_undangan,
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

            $data = [
                'nama_undangan' => $nama_undangan,
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
    public function show($id, $weddingDesign7Id)
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
        // Mendapatkan instance NamaUndangan berdasarkan ID
        $nama_undangan = NamaUndanganDesign7::findOrFail($id);

        // Update nama undangan
        $nama_undangan->nama_undangan = $request->nama_undangan;

        // Simpan perubahan
        $nama_undangan->save();

        // Redirect ke halaman list dengan pesan sukses
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
