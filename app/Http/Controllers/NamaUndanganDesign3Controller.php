<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign3;
use App\Models\WeddingDesign3;
use Illuminate\Http\Request;
use Validator;

class NamaUndanganDesign3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($weddingDesign3Id)
    {
        $weddingDesign3 = WeddingDesign3::findOrFail($weddingDesign3Id);
        $nama_undangan = $weddingDesign3->namaUndangan()->paginate(10);

        return view('user-design3.index', [
            'weddingDesign3' => $weddingDesign3,
            'nama_undangan' => $nama_undangan,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($weddingDesign3Id)
    {
        $weddingDesign3 = WeddingDesign3::findOrFail($weddingDesign3Id);
        return view('user-design3.create', compact('weddingDesign3Id', 'weddingDesign3'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $weddingDesign3)
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

        // Mendapatkan instance weddingDesign3$weddingDesign3 berdasarkan ID
        $weddingDesign3 = WeddingDesign3::findOrFail($weddingDesign3);

        // Memecah nama undangan menjadi array
        $nama_undangans = explode("\n", $request->nama_undangan);

        foreach ($nama_undangans as $nama_undangan) {
            $nama_undangan = trim($nama_undangan);

            $data = [
                'nama_undangan' => $nama_undangan,
            ];

            // Buat instance NamaUndangan
            $namaUndangan = new NamaUndanganDesign3($data);

            // Simpan model NamaUndangan terkait dengan weddingDesign3$weddingDesign3
            $weddingDesign3->namaUndangan()->save($namaUndangan);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nama-undangan-list3', $weddingDesign3)->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $weddingDesign3Id)
    {
        $nama_undangan = NamaUndanganDesign3::findOrFail($id);
        return view('user-design3.show', [
            'nama_undangan' => $nama_undangan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NamaUndanganDesign3::findOrFail($id);
        $weddingDesign3Id = $data->wedding_design3_id;
        return view('user-design3.edit', [
            'data' => $data,
            'weddingDesign3Id' => $weddingDesign3Id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $weddingDesign3Id, string $id)
    {
        // Mendapatkan instance NamaUndangan berdasarkan ID
        $nama_undangan = NamaUndanganDesign3::findOrFail($id);

        // Update nama undangan
        $nama_undangan->nama_undangan = $request->nama_undangan;

        // Simpan perubahan
        $nama_undangan->save();

        // Redirect ke halaman list dengan pesan sukses
        return redirect()->route('nama-undangan-list3', $weddingDesign3Id)->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id = null)
    {
        // Hapus data tunggal berdasarkan ID yang diterima
        $data = NamaUndanganDesign3::find($id);
        if ($data) {
            $data->delete();
            // Redirect back to the previous page
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
