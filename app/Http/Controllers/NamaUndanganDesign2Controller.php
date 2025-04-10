<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign2;
use App\Models\WeddingDesign2;
use Illuminate\Http\Request;
use Validator;

class NamaUndanganDesign2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($weddingDesign2Id)
    {
        $weddingDesign2 = WeddingDesign2::findOrFail($weddingDesign2Id);
        $nama_undangan = $weddingDesign2->namaUndangan()->paginate(10);

        return view('user-design2.index', [
            'weddingDesign2' => $weddingDesign2,
            'nama_undangan' => $nama_undangan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($weddingDesign2Id)
    {
        $weddingDesign2 = WeddingDesign2::findOrFail($weddingDesign2Id);
        return view('user-design2.create', compact('weddingDesign2Id', 'weddingDesign2'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $weddingDesign2)
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

        // Mendapatkan instance weddingDesign2$weddingDesign2 berdasarkan ID
        $weddingDesign2 = WeddingDesign2::findOrFail($weddingDesign2);

        // Memecah nama undangan menjadi array
        $nama_undangans = explode("\n", $request->nama_undangan);

        foreach ($nama_undangans as $nama_undangan) {
            $nama_undangan = trim($nama_undangan);

            $data = [
                'nama_undangan' => $nama_undangan,
            ];

            // Buat instance NamaUndangan
            $namaUndangan = new NamaUndanganDesign2($data);

            // Simpan model NamaUndangan terkait dengan weddingDesign2$weddingDesign2
            $weddingDesign2->namaUndangan()->save($namaUndangan);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nama-undangan-list2', $weddingDesign2)->with('success', 'Berhasil menambahkan data');
    }


    /**
     * Display the specified resource.
     */
    public function show($id, $weddingDesign2Id)
    {
        $nama_undangan = NamaUndanganDesign2::findOrFail($id);
        return view('user-design2.show', [
            'nama_undangan' => $nama_undangan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NamaUndanganDesign2::findOrFail($id);
        $weddingDesign2Id = $data->wedding_design2_id;
        return view('user-design2.edit', [
            'data' => $data,
            'weddingDesign2Id' => $weddingDesign2Id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $weddingDesign2Id, string $id)
    {
        // Mendapatkan instance NamaUndangan berdasarkan ID
        $nama_undangan = NamaUndanganDesign2::findOrFail($id);

        // Update nama undangan
        $nama_undangan->nama_undangan = $request->nama_undangan;

        // Simpan perubahan
        $nama_undangan->save();

        // Redirect ke halaman list dengan pesan sukses
        return redirect()->route('nama-undangan-list2', $weddingDesign2Id)->with('success', 'Berhasil memperbarui data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id = null)
    {
        // Hapus data tunggal berdasarkan ID yang diterima
        $data = NamaUndanganDesign2::find($id);
        if ($data) {
            $data->delete();
            // Redirect back to the previous page
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }
}
