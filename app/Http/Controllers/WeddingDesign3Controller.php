<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeddingDesign3FormRequest;
use App\Models\WeddingDesign3;
use Illuminate\Http\Request;
use Storage;

class WeddingDesign3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = WeddingDesign3::orderBy('id', 'desc')->paginate(10);
        return view('admin-design3.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-design3.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign3FormRequest $request)
    {
        $data = $request->all();

        // Simpan jalur penyimpanan untuk gambar utama
        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design3', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design3', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design3', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design3', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design3-music', $request->file('music')->getClientOriginalName());
        }

        if ($request->hasFile('gambar1')) {
            $data['gambar1'] = $request->file('gambar1')->storeAs('public/wedding-design3', $request->file('gambar1')->getClientOriginalName());
        }

        if ($request->hasFile('gambar2')) {
            $data['gambar2'] = $request->file('gambar2')->storeAs('public/wedding-design3', $request->file('gambar2')->getClientOriginalName());
        }

        foreach (range(1, 5) as $index) {
            $galeri_field = 'galeri_img' . $index;
            if ($request->hasFile($galeri_field)) {
                $data[$galeri_field] = $request->file($galeri_field)->storeAs('public/wedding-design3', $request->file($galeri_field)->getClientOriginalName());
            } else {
                $data[$galeri_field] = NULL; // Atur default.jpg sesuai kebutuhan Anda
            }
        }

        foreach (['video'] as $file) {
            if ($request->hasFile($file)) {
                $fileInstance = $request->file($file);
                $filePath = $fileInstance->storeAs('public/images', $fileInstance->hashName());
                $data[$file] = $filePath;
            } else {
                $data[$file] = NULL;
            }
        }

        WeddingDesign3::create($data);

        return redirect()->route('wedding-design3')->with('success', 'Berhasil menambahkan data');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = WeddingDesign3::findOrFail($id);
        $nama_undangan = $data->namaUndangan;
        return view('admin-design3.show', [
            'data' => $data,
            'nama_undangan' => $nama_undangan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = WeddingDesign3::findOrFail($id);
        return view('admin-design3.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $weddingDesign3 = WeddingDesign3::findOrFail($id);

        // Simpan gambar ke penyimpanan
        $data = $request->all();

        if ($request->hasFile('banner_img')) {
            // Hapus gambar lama jika ada
            if ($weddingDesign3->banner_img) {
                Storage::delete($weddingDesign3->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design3', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            if ($weddingDesign3->foto_prewedding) {
                Storage::delete($weddingDesign3->foto_prewedding);
            }
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design3', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign3->foto_mempelai_laki) {
                Storage::delete($weddingDesign3->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design3', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign3->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign3->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design3', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign3->music) {
                Storage::delete($weddingDesign3->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design3-music', $request->file('music')->getClientOriginalName());
        }

        if ($request->hasFile('gambar1')) {
            if ($weddingDesign3->gambar1) {
                Storage::delete($weddingDesign3->gambar1);
            }
            $data['gambar1'] = $request->file('gambar1')->storeAs('public/wedding-design3', $request->file('gambar1')->getClientOriginalName());
        }

        if ($request->hasFile('gambar2')) {
            if ($weddingDesign3->gambar2) {
                Storage::delete($weddingDesign3->gambar2);
            }
            $data['gambar2'] = $request->file('gambar2')->storeAs('public/wedding-design3', $request->file('gambar2')->getClientOriginalName());
        }

        // Periksa apakah file galeri diunggah sebelum menyimpannya
        foreach (range(1, 6) as $index) {
            $galeri_field = 'galeri_img' . $index;
            if ($request->hasFile($galeri_field)) {
                // Hapus gambar lama jika ada
                if ($weddingDesign3->$galeri_field) {
                    Storage::delete($weddingDesign3->$galeri_field);
                }
                $data[$galeri_field] = $request->file($galeri_field)->storeAs('public/wedding-design3', $request->file($galeri_field)->getClientOriginalName());
            } else {
                // Jika file galeri tidak diunggah, tetap gunakan yang lama
                $data[$galeri_field] = $weddingDesign3->$galeri_field;
            }
        }

        $weddingDesign3->update($data);

        return redirect()->route('wedding-design3')->with('success', 'Data berhasil diperbarui.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = WeddingDesign3::find($id)->delete();
        return redirect()->route('wedding-design3')->with('success', 'Data berhasil Dihapus');

    }
}
