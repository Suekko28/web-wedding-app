<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign4FormRequest;
use Illuminate\Support\Str;
use App\Models\InformasiDesign4;
use App\Models\UcapanDesign4;
use App\Models\WeddingDesign4;
use Illuminate\Http\Request;

class HomeDesign4Controller extends Controller
{

    public function store(UcapanDesign4FormRequest $request, string $id_weddingdesign4, string $slug_nama_pasangan, string $slug_nama_undangan)
    {

        // Cari informasi dari InformasiDesign4 berdasarkan slug nama pasangan
        $informasi = InformasiDesign4::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign4', 'like', 'PDT-WDDS4-%-' . $id_weddingdesign4)
            ->firstOrFail();

        // Ambil WeddingDesign4 yang terkait
        $undanganAlt4 = $informasi->KontenDesign4()->firstOrFail();

        // Cek apakah nama undangan sesuai
        $undanganAlt4->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Simpan ucapan
        $alt4Model = new UcapanDesign4();
        $alt4Model->fill($request->validated());
        $undanganAlt4->alt4Models()->save($alt4Model);

        return redirect()->route('wedding-design4-home', [
            'id_weddingdesign4' => $id_weddingdesign4,
            'slug_nama_pasangan' => $slug_nama_pasangan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($id_weddingdesign4, $slug_nama_pasangan)
    {
        // Ambil entri berdasarkan nomor urut
        $informasi = InformasiDesign4::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign4', 'like', 'PDT-WDDS4-%-' . $id_weddingdesign4)
            ->firstOrFail();

        $data = $informasi->KontenDesign4->first();

        return view('admin-design4.home-design4', compact('data'));
    }

    public function showDetail(string $id_weddingdesign4, string $slug_nama_pasangan, string $slug_nama_undangan)
    {
        // Ambil informasi berdasarkan kode unik
        $informasi = InformasiDesign4::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign4', 'like', 'PDT-WDDS4-%-' . $id_weddingdesign4)
            ->firstOrFail();

        // Ambil entri WeddingDesign4 (konten) pertama
        $data = $informasi->KontenDesign4()->first();

        // Ambil nama undangan berdasarkan slug
        $namaUndangan = $data->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Ambil relasi ucapan
        $alt4models = $data->alt4Models()->orderBy('created_at', 'desc')->get();

        // Hitung kehadiran
        $hadirCount = $alt4models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt4models->where('kehadiran', 0)->count();

        return view('wedding-design4.home', compact(
            'data',
            'alt4models',
            'slug_nama_undangan',
            'slug_nama_pasangan',
            'id_weddingdesign4',
            'namaUndangan',
            'hadirCount',
            'tidakHadirCount'
        ));
    }

}
