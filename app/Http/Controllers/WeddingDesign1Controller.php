<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeddingDesign1FormRequest;
use App\Models\WeddingDesign1;
use Illuminate\Http\Request;
use Storage;

class WeddingDesign1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = WeddingDesign1::orderBy('id', 'desc')->paginate(10);
        return view('admin-design1.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-design1.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign1FormRequest $request)
    {
        // Simpan gambar ke penyimpanan
        $data = $request->all();

        // Simpan jalur penyimpanan untuk gambar utama
        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design1', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design1', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design1', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design1', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design1-music', $request->file('music')->getClientOriginalName());
        }

        // Periksa apakah file galeri diunggah sebelum menyimpannya
        foreach (range(1, 6) as $index) {
            $galeri_field = 'galeri_img' . $index;
            if ($request->hasFile($galeri_field)) {
                $data[$galeri_field] = $request->file($galeri_field)->storeAs('public/wedding-design1', $request->file($galeri_field)->getClientOriginalName());
            } else {
                $data[$galeri_field] = NULL; // Atur default.jpg sesuai kebutuhan Anda
            }
        }

        // Check if additional files are uploaded before saving them
        foreach (['foto_pertemuan', 'foto_pendekatan', 'foto_lamaran', 'foto_pernikahan'] as $file) {
            if ($request->hasFile($file)) {
                $data[$file] = $request->file($file)->storeAs('public/wedding-design1', $request->file($file)->getClientOriginalName());
            } else {
                $data[$file] = NULL; // or set it to null if preferred
            }
        }

        // Simpan data ke database
        WeddingDesign1::create($data);

        return redirect()->route('wedding-design1')->with('success', 'Berhasil menambahkan data');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = WeddingDesign1::findOrFail($id);
        $nama_undangan = $data->namaUndangan;
        return view('admin-design1.show', [
            'data' => $data,
            'nama_undangan' => $nama_undangan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = WeddingDesign1::findOrFail($id);
        return view('admin-design1.edit', [
            'data' => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeddingDesign1FormRequest $request, $id)
    {
        $weddingDesign1 = WeddingDesign1::findOrFail($id);

        // Simpan gambar ke penyimpanan
        $data = $request->all();

        // Simpan jalur penyimpanan untuk gambar utama
        if ($request->hasFile('banner_img')) {
            // Hapus gambar lama jika ada
            if ($weddingDesign1->banner_img) {
                Storage::delete($weddingDesign1->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design1', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            if ($weddingDesign1->foto_prewedding) {
                Storage::delete($weddingDesign1->foto_prewedding);
            }
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design1', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign1->foto_mempelai_laki) {
                Storage::delete($weddingDesign1->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design1', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign1->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign1->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design1', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign1->music) {
                Storage::delete($weddingDesign1->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design1-music', $request->file('music')->getClientOriginalName());
        }

        // Periksa apakah file galeri diunggah sebelum menyimpannya
        foreach (range(1, 6) as $index) {
            $galeri_field = 'galeri_img' . $index;
            if ($request->hasFile($galeri_field)) {
                // Hapus gambar lama jika ada
                if ($weddingDesign1->$galeri_field) {
                    Storage::delete($weddingDesign1->$galeri_field);
                }
                $data[$galeri_field] = $request->file($galeri_field)->storeAs('public/wedding-design1', $request->file($galeri_field)->getClientOriginalName());
            } else {
                // Jika file galeri tidak diunggah, tetap gunakan yang lama
                $data[$galeri_field] = $weddingDesign1->$galeri_field;
            }
        }

        // Check if additional files are uploaded before saving them
        foreach (['foto_pertemuan', 'foto_pendekatan', 'foto_lamaran', 'foto_pernikahan'] as $file) {
            if ($request->hasFile($file)) {
                // Hapus gambar lama jika ada
                if ($weddingDesign1->$file) {
                    Storage::delete($weddingDesign1->$file);
                }
                $data[$file] = $request->file($file)->storeAs('public/wedding-design1', $request->file($file)->getClientOriginalName());
            } else {
                // Jika file tidak diunggah, tetap gunakan yang lama
                $data[$file] = $weddingDesign1->$file;
            }
        }

        // Perbarui data di database
        $weddingDesign1->update($data);

        return redirect()->route('wedding-design1')->with('success', 'Data berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = WeddingDesign1::find($id)->delete();
        return redirect()->route('wedding-design1')->with('success', 'Data berhasil Dihapus');
    }
}
