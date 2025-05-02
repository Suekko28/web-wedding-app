<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign5FormRequest;
use App\Models\InformasiDesign5;
use App\Models\UcapanDesign5;
use App\Models\WeddingDesign5;
use Illuminate\Http\Request;

class HomeDesign5Controller extends Controller
{
    public function store(UcapanDesign5FormRequest $request, string $id_weddingdesign5, string $slug_nama_pasangan, string $slug_nama_undangan)
    {

        // Cari informasi dari InformasiDesign5 berdasarkan slug nama pasangan
        $informasi = InformasiDesign5::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign5', 'like', 'PDT-WDDS5-%-' . $id_weddingdesign5)
            ->firstOrFail();

        // Ambil WeddingDesign5 yang terkait
        $undanganAlt5 = $informasi->KontenDesign5()->firstOrFail();

        // Cek apakah nama undangan sesuai
        $undanganAlt5->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Simpan ucapan
        $alt5Model = new UcapanDesign5();
        $alt5Model->fill($request->validated());
        $undanganAlt5->alt5Models()->save($alt5Model);

        return redirect()->route('wedding-design5-home', [
            'id_weddingdesign5' => $id_weddingdesign5,
            'slug_nama_pasangan' => $slug_nama_pasangan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($id_weddingdesign5, $slug_nama_pasangan)
    {
        // Ambil entri berdasarkan nomor urut
        $informasi = InformasiDesign5::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign5', 'like', 'PDT-WDDS5-%-' . $id_weddingdesign5)
            ->firstOrFail();

        $data = $informasi->KontenDesign5->first();

        return view('admin-design5.home-design5', compact('data'));
    }

    public function showDetail(string $id_weddingdesign5, string $slug_nama_pasangan, string $slug_nama_undangan)
    {

        // Ambil informasi berdasarkan kode unik
        $informasi = InformasiDesign5::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign5', 'like', 'PDT-WDDS5-%-' . $id_weddingdesign5)
            ->firstOrFail();

        // Ambil entri WeddingDesign5 (konten) pertama
        $data = $informasi->KontenDesign5()->first();

        // Ambil nama undangan berdasarkan slug
        $namaUndangan = $data->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Ambil relasi ucapan
        $alt5models = $data->alt5Models()->orderBy('created_at', 'desc')->get();

        // Hitung kehadiran
        $hadirCount = $alt5models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt5models->where('kehadiran', 0)->count();

        return view('wedding-design5.home', compact(
            'data',
            'alt5models',
            'slug_nama_undangan',
            'slug_nama_pasangan',
            'id_weddingdesign5',
            'namaUndangan',
            'hadirCount',
            'tidakHadirCount'
        ));
    }
}
