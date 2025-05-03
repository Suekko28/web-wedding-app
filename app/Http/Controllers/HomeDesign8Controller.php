<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign8FormRequest;
use App\Models\InformasiDesign8;
use App\Models\UcapanDesign8;
use App\Models\WeddingDesign8;
use Illuminate\Http\Request;

class HomeDesign8Controller extends Controller
{
    public function store(UcapanDesign8FormRequest $request, string $id_weddingdesign8, string $slug_nama_pasangan, string $slug_nama_undangan)
    {

        // Cari informasi dari InformasiDesign8 berdasarkan slug nama pasangan
        $informasi = InformasiDesign8::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign8', 'like', 'PDT-WDDS8-%-' . $id_weddingdesign8)
            ->firstOrFail();

        // Ambil WeddingDesign8 yang terkait
        $undanganAlt8 = $informasi->KontenDesign8()->firstOrFail();

        // Cek apakah nama undangan sesuai
        $undanganAlt8->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Simpan ucapan
        $alt8Model = new UcapanDesign8();
        $alt8Model->fill($request->validated());
        $undanganAlt8->alt8Models()->save($alt8Model);

        return redirect()->route('wedding-design8-home', [
            'id_weddingdesign8' => $id_weddingdesign8,
            'slug_nama_pasangan' => $slug_nama_pasangan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($id_weddingdesign8, $slug_nama_pasangan)
    {
        // Ambil entri berdasarkan nomor urut
        $informasi = InformasiDesign8::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign8', 'like', 'PDT-WDDS8-%-' . $id_weddingdesign8)
            ->firstOrFail();

        $data = $informasi->KontenDesign8->first();

        return view('admin-design8.home-design8', compact('data'));
    }

    public function showDetail(string $id_weddingdesign8, string $slug_nama_pasangan, string $slug_nama_undangan)
    {
        // Ambil informasi berdasarkan kode unik
        $informasi = InformasiDesign8::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign8', 'like', 'PDT-WDDS8-%-' . $id_weddingdesign8)
            ->firstOrFail();

        // Ambil entri WeddingDesign8 (konten) pertama
        $data = $informasi->KontenDesign8()->first();

        // Ambil nama undangan berdasarkan slug
        $namaUndangan = $data->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Ambil relasi ucapan
        $alt8models = $data->alt8Models()->orderBy('created_at', 'desc')->get();

        // Hitung kehadiran
        $hadirCount = $alt8models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt8models->where('kehadiran', 0)->count();

        return view('wedding-design8.home', compact(
            'data',
            'alt8models',
            'slug_nama_undangan',
            'slug_nama_pasangan',
            'id_weddingdesign8',
            'namaUndangan',
            'hadirCount',
            'tidakHadirCount'
        ));
    }

}
