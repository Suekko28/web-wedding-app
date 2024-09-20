<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeddingDesign2FormRequest;
use App\Models\WeddingDesign2;
use Illuminate\Http\Request;
use Storage;

class WeddingDesign2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = WeddingDesign2::orderBy('id', 'desc')->paginate(10);
        return view('admin-design2.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-design2.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign2FormRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('background_img')) {
            $data['background_img'] = $request->file('background_img')->storeAs('public/wedding-design2.index', $request->file('background_img')->getClientOriginalName());
        }

        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design2.index', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design2.index', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design2.index', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design2.index', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design2.index-music', $request->file('music')->getClientOriginalName());
        }

        // Periksa apakah file galeri diunggah sebelum menyimpannya
        foreach (range(1, 6) as $index) {
            $galeri_field = 'galeri_img' . $index;
            if ($request->hasFile($galeri_field)) {
                $data[$galeri_field] = $request->file($galeri_field)->storeAs('public/wedding-design2.index', $request->file($galeri_field)->getClientOriginalName());
            } else {
                $data[$galeri_field] = NULL; // Atur default.jpg sesuai kebutuhan Anda
            }
        }

        $currentDate = date('dmY'); // Mengambil tanggal dengan format Ymd
        $latestWeddingDesign2 = WeddingDesign2::orderBy('id', 'desc')->first(); // Mengambil data seserahan terakhir

        // Menentukan urutan ID Seserahan
        if ($latestWeddingDesign2) {
            $lastId = intval(substr($latestWeddingDesign2->id_weddingdesign2, -4)); // Mengambil 4 digit terakhir dari id_weddingdesign2
            $newIdNumber = $lastId + 1; // Menambah 1 dari id terakhir
        } else {
            $newIdNumber = 1; // Jika belum ada data, mulai dari 1
        }

        $idWeddingDesign2 = 'PDT-WDDS2-' . $currentDate . '-' . sprintf('%04d', $newIdNumber); // Format PDT-SSH-Ymd0001
        
        $data['id_weddingdesign2'] = $idWeddingDesign2;


        // Simpan data ke database
        WeddingDesign2::create($data);

        return redirect()->route('wedding-design2.index')->with('success', 'Berhasil menambahkan data');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = WeddingDesign2::findOrFail($id);
        $nama_undangan = $data->namaUndangan;
        return view('admin-design2.show', [
            'data' => $data,
            'nama_undangan' => $nama_undangan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = WeddingDesign2::findOrFail($id);
        return view('admin-design2.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $weddingDesign2 = WeddingDesign2::findOrFail($id);

        // Simpan gambar ke penyimpanan
        $data = $request->all();

        // Simpan jalur penyimpanan untuk gambar utama
        if ($request->hasFile('banner_img')) {
            // Hapus gambar lama jika ada
            if ($weddingDesign2->banner_img) {
                Storage::delete($weddingDesign2->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design2.index', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            if ($weddingDesign2->foto_prewedding) {
                Storage::delete($weddingDesign2->foto_prewedding);
            }
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design2.index', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign2->foto_mempelai_laki) {
                Storage::delete($weddingDesign2->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design2.index', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign2->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign2->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design2.index', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign2->music) {
                Storage::delete($weddingDesign2->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design2.index-music', $request->file('music')->getClientOriginalName());
        }

        // Periksa apakah file galeri diunggah sebelum menyimpannya
        foreach (range(1, 6) as $index) {
            $galeri_field = 'galeri_img' . $index;
            if ($request->hasFile($galeri_field)) {
                // Hapus gambar lama jika ada
                if ($weddingDesign2->$galeri_field) {
                    Storage::delete($weddingDesign2->$galeri_field);
                }
                $data[$galeri_field] = $request->file($galeri_field)->storeAs('public/wedding-design2.index', $request->file($galeri_field)->getClientOriginalName());
            } else {
                // Jika file galeri tidak diunggah, tetap gunakan yang lama
                $data[$galeri_field] = $weddingDesign2->$galeri_field;
            }
        }
        $weddingDesign2->update($data);

        return redirect()->route('wedding-design2.index')->with('success', 'Data berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = WeddingDesign2::find($id)->delete();
        return redirect()->route('wedding-design2.index')->with('success', 'Data berhasil Dihapus');
    }
}
