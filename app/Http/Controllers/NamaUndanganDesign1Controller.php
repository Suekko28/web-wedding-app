<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign1;
use App\Models\WeddingDesign1;
use Illuminate\Http\Request;
use Validator;

class NamaUndanganDesign1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($weddingDesign1Id)
    {
        $weddingDesign1 = WeddingDesign1::findOrFail($weddingDesign1Id);
        $nama_undangan = $weddingDesign1->namaUndangan()->paginate(10);

        return view('user-design1.index', [
            'weddingDesign1' => $weddingDesign1,
            'nama_undangan' => $nama_undangan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($weddingDesign1Id)
    {
        $weddingDesign1 = WeddingDesign1::findOrFail($weddingDesign1Id);
        return view('user-design1.create', compact('weddingDesign1Id', 'weddingDesign1'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $weddingDesign1Id)
    {
        // Definisikan pesan untuk validasi
        $messages = [
            'required' => 'Kolom :attribute harus diisi.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'nama_undangan.required' => 'Nama undangan harus diisi.',
        ];

        // Validasi input nama undangan
        $validator = Validator::make($request->all(), [
            'nama_undangan' => 'required|string', // Anda dapat menyesuaikan aturan validasi sesuai kebutuhan
        ], $messages);

        // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mendapatkan instance weddingDesign1$weddingDesign1 berdasarkan ID
        $weddingDesign1 = WeddingDesign1::findOrFail($weddingDesign1Id);

        // Memecah nama undangan menjadi array
        $nama_undangans = explode("\n", $request->nama_undangan);

        foreach ($nama_undangans as $nama_undangan) {
            $nama_undangan = trim($nama_undangan);

            $data = [
                'nama_undangan' => $nama_undangan,
            ];

            // Buat instance NamaUndangan
            $namaUndangan = new NamaUndanganDesign1($data);

            // Simpan model NamaUndangan terkait dengan weddingDesign1$weddingDesign1
            $weddingDesign1->namaUndangan()->save($namaUndangan);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nama-undangan-list', $weddingDesign1Id)->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $weddingDesign1Id)
    {
        $nama_undangan = NamaUndanganDesign1::findOrFail($id);
        return view('user-design1.show', [
            'nama_undangan' => $nama_undangan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NamaUndanganDesign1::findOrFail($id);
        $weddingDesign1Id = $data->wedding_design1_id;
        return view('user-design1.edit', [
            'data' => $data,
            'weddingDesign1Id' => $weddingDesign1Id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $weddingDesign1Id, string $id)
    {
        // Mendapatkan instance NamaUndangan berdasarkan ID
        $nama_undangan = NamaUndanganDesign1::findOrFail($id);

        // Update nama undangan
        $nama_undangan->nama_undangan = $request->nama_undangan;

        // Simpan perubahan
        $nama_undangan->save();

        // Redirect ke halaman list dengan pesan sukses
        return redirect()->route('nama-undangan-list1', $weddingDesign1Id)->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id = null)
    {
        // Hapus data tunggal berdasarkan ID yang diterima
        $data = NamaUndanganDesign1::find($id);
        if ($data) {
            $data->delete();
            // Redirect back to the previous page
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

}
