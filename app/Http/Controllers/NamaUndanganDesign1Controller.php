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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
