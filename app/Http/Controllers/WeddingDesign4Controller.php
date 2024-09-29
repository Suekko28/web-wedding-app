<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeddingDesign4FormRequest;
use App\Models\InformasiDesign4;
use App\Models\WeddingDesign4;
use Illuminate\Http\Request;
use Storage;

class WeddingDesign4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // // Menampilkan list undangan yang ada di tabel InformasiDesign4
        // $data = InformasiDesign4::paginate(10); // Misal paginasi 10 data per halaman
        // return view('admin-design4.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($informasiDesign4Id)
    {
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        // Temukan data berdasarkan ID
        return view('admin-design4.create', compact('informasiDesign4Id', 'informasiDesign4'));  // Kirim data ke view
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign4FormRequest $request, $informasiDesign4Id)
    {
        // Cek apakah InformasiDesign4 sudah ada
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        $data = $request->all();


        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design4', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design4', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design4', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design4', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design4-music', $request->file('music')->getClientOriginalName());
        }

        $data['informasi_design4_id'] = $informasiDesign4->id;

        WeddingDesign4::create($data);

        return redirect()->route('wedding-design4.index', $informasiDesign4Id)->with('success', 'Berhasil menambahkan data');

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
    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($informasiDesign4Id, $id)
    {
        $data = WeddingDesign4::findOrFail($id);
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);

        return view('admin-design4.edit', compact('data', 'informasiDesign4'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeddingDesign4FormRequest $request, $informasiDesign4Id, $id)
    {
        $weddingDesign4 = WeddingDesign4::findOrFail($id);
        $data = $request->all();

        // Check and handle uploaded files
        if ($request->hasFile('banner_img')) {
            if ($weddingDesign4->banner_img) {
                Storage::delete($weddingDesign4->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design4', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            if ($weddingDesign4->foto_prewedding) {
                Storage::delete($weddingDesign4->foto_prewedding);
            }
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design4', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign4->foto_mempelai_laki) {
                Storage::delete($weddingDesign4->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design4', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign4->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign4->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design4', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign4->music) {
                Storage::delete($weddingDesign4->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design4-music', $request->file('music')->getClientOriginalName());
        }

        $weddingDesign4->update($data);

        return redirect()->route('wedding-design4.index', $informasiDesign4Id)->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
