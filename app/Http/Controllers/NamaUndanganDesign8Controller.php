<?php

namespace App\Http\Controllers;

use App\Models\NamaUndanganDesign8;
use App\Models\WeddingDesign8;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Str;

class NamaUndanganDesign8Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($weddingDesign8Id)
    {
        $weddingDesign8 = WeddingDesign8::findOrFail($weddingDesign8Id);
        $nama_undangan = $weddingDesign8->namaUndangan()->paginate(10);

        return view('user-design8.index', [
            'weddingDesign8' => $weddingDesign8,
            'nama_undangan' => $nama_undangan,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create($weddingDesign8Id)
    {
        $weddingDesign8 = WeddingDesign8::findOrFail($weddingDesign8Id);


        // Pass both `$weddingDesign8Id` and `$idWeddingDesign8` to the view
        return view('user-design8.create', [
            'weddingDesign8' => $weddingDesign8,
        ]);
    }

    public function store(Request $request, $weddingDesign8Id)
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

        // Mendapatkan instance weddingDesign8 berdasarkan ID
        $weddingDesign8 = WeddingDesign8::findOrFail($weddingDesign8Id);

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
            $namaUndangan = new NamaUndanganDesign8($data);
            // Simpan model NamaUndangan terkait dengan weddingDesign8
            $weddingDesign8->namaUndangan()->save($namaUndangan);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('nama-undangan-list8', ['weddingDesign8Id' => $weddingDesign8Id])->with('success', 'Berhasil menambahkan data');
    }


    /**
     * Display the specified resource.
     */
    public function show($id, $weddingdesign8Id)
    {
        $nama_undangan = NamaUndanganDesign8::findOrFail($id);
        return view('user-design8.show', [
            'nama_undangan' => $nama_undangan
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NamaUndanganDesign8::findOrFail($id);
        $weddingDesign8Id = $data->wedding_design8_id;

        // Dapatkan weddingDesign8 berdasarkan ID
        $weddingDesign8 = WeddingDesign8::findOrFail($weddingDesign8Id);

        return view('user-design8.edit', [
            'data' => $data,
            'weddingDesign8' => $weddingDesign8, // Kirimkan variabel ini
            'weddingDesign8Id' => $weddingDesign8Id,
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $weddingDesign8Id, string $id)
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

        $nama_undangan = NamaUndanganDesign8::findOrFail($id);
        $nama_undangan->nama_undangan = $request->nama_undangan;
        $nama_undangan->slug_nama_undangan = Str::slug($request->nama_undangan);
        $nama_undangan->save();

        return redirect()->route('nama-undangan-list8', $weddingDesign8Id)->with('success', 'Berhasil memperbarui data');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id = null)
    {
        // Hapus data tunggal berdasarkan ID yang diterima
        $data = NamaUndanganDesign8::find($id);
        if ($data) {
            $data->delete();
            // Redirect back to the previous page
            return redirect()->back()->with('success', 'Data berhasil dihapus');
        } else {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
    }

}
