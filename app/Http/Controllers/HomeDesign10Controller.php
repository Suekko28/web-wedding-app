<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign10FormRequest;
use App\Models\InformasiDesign10;
use App\Models\UcapanDesign10;
use Illuminate\Http\Request;

class HomeDesign10Controller extends Controller
{
    public function store(UcapanDesign10FormRequest $request, string $id_weddingdesign10, string $slug_nama_pasangan, string $slug_nama_undangan)
    {

        // Cari informasi dari InformasiDesign10 berdasarkan slug nama pasangan
        $informasi = InformasiDesign10::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign10', 'like', 'PDT-WDDS10-%-' . $id_weddingdesign10)
            ->firstOrFail();

        // Ambil WeddingDesign10 yang terkait
        $undanganAlt10 = $informasi->KontenDesign10()->firstOrFail();

        // Cek apakah nama undangan sesuai
        $undanganAlt10->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Simpan ucapan
        $alt10Model = new UcapanDesign10();
        $alt10Model->fill($request->validated());
        $undanganAlt10->alt10Models()->save($alt10Model);

        return redirect()->route('wedding-design10-home', [
            'id_weddingdesign10' => $id_weddingdesign10,
            'slug_nama_pasangan' => $slug_nama_pasangan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($id_weddingdesign10, $slug_nama_pasangan)
    {
        // Ambil entri berdasarkan nomor urut
        $informasi = InformasiDesign10::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign10', 'like', 'PDT-WDDS10-%-' . $id_weddingdesign10)
            ->firstOrFail();

        $data = $informasi->KontenDesign10->first();

        return view('admin-design10.home-design10', compact('data'));
    }

    public function showDetail(string $id_weddingdesign10, string $slug_nama_pasangan, string $slug_nama_undangan)
    {
        // Ambil informasi berdasarkan kode unik
        $informasi = InformasiDesign10::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign10', 'like', 'PDT-WDDS10-%-' . $id_weddingdesign10)
            ->firstOrFail();

        // Ambil entri WeddingDesign10 (konten) pertama
        $data = $informasi->KontenDesign10()->first();

        // Ambil nama undangan berdasarkan slug
        $namaUndangan = $data->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Ambil relasi ucapan
        $alt10models = $data->alt10Models()->orderBy('created_at', 'desc')->get();

        // Hitung kehadiran
        $hadirCount = $alt10models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt10models->where('kehadiran', 0)->count();

        return view('wedding-design10.home', compact(
            'data',
            'alt10models',
            'slug_nama_undangan',
            'slug_nama_pasangan',
            'id_weddingdesign10',
            'namaUndangan',
            'hadirCount',
            'tidakHadirCount'
        ));
    }

}
