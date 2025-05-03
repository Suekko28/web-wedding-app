<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign9FormRequest;
use App\Models\InformasiDesign9;
use App\Models\UcapanDesign9;
use App\Models\WeddingDesign9;
use Illuminate\Http\Request;

class HomeDesign9Controller extends Controller
{
    public function store(UcapanDesign9FormRequest $request, string $id_weddingdesign9, string $slug_nama_pasangan, string $slug_nama_undangan)
    {

        // Cari informasi dari InformasiDesign9 berdasarkan slug nama pasangan
        $informasi = InformasiDesign9::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign9', 'like', 'PDT-WDDS9-%-' . $id_weddingdesign9)
            ->firstOrFail();

        // Ambil WeddingDesign9 yang terkait
        $undanganAlt9 = $informasi->KontenDesign9()->firstOrFail();

        // Cek apakah nama undangan sesuai
        $undanganAlt9->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Simpan ucapan
        $alt9Model = new UcapanDesign9();
        $alt9Model->fill($request->validated());
        $undanganAlt9->alt9Models()->save($alt9Model);

        return redirect()->route('wedding-design9-home', [
            'id_weddingdesign9' => $id_weddingdesign9,
            'slug_nama_pasangan' => $slug_nama_pasangan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($id_weddingdesign9, $slug_nama_pasangan)
    {
        // Ambil entri berdasarkan nomor urut
        $informasi = InformasiDesign9::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign9', 'like', 'PDT-WDDS9-%-' . $id_weddingdesign9)
            ->firstOrFail();

        $data = $informasi->KontenDesign9->first();

        return view('admin-design9.home-design9', compact('data'));
    }

    public function showDetail(string $id_weddingdesign9, string $slug_nama_pasangan, string $slug_nama_undangan)
    {
        // Ambil informasi berdasarkan kode unik
        $informasi = InformasiDesign9::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign9', 'like', 'PDT-WDDS9-%-' . $id_weddingdesign9)
            ->firstOrFail();

        // Ambil entri WeddingDesign9 (konten) pertama
        $data = $informasi->KontenDesign9()->first();

        // Ambil nama undangan berdasarkan slug
        $namaUndangan = $data->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Ambil relasi ucapan
        $alt9models = $data->alt9Models()->orderBy('created_at', 'desc')->get();

        // Hitung kehadiran
        $hadirCount = $alt9models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt9models->where('kehadiran', 0)->count();

        return view('wedding-design9.home', compact(
            'data',
            'alt9models',
            'slug_nama_undangan',
            'slug_nama_pasangan',
            'id_weddingdesign9',
            'namaUndangan',
            'hadirCount',
            'tidakHadirCount'
        ));
    }

}
