<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign7FormRequest;
use App\Models\InformasiDesign7;
use App\Models\UcapanDesign7;
use App\Models\WeddingDesign7;
use Illuminate\Http\Request;

class HomeDesign7Controller extends Controller
{
    public function store(UcapanDesign7FormRequest $request, string $id_weddingdesign7, string $slug_nama_pasangan, string $slug_nama_undangan)
    {

        // Cari informasi dari InformasiDesign7 berdasarkan slug nama pasangan
        $informasi = InformasiDesign7::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign7', 'like', 'PDT-WDDS7-%-' . $id_weddingdesign7)
            ->firstOrFail();

        // Ambil WeddingDesign7 yang terkait
        $undanganAlt7 = $informasi->KontenDesign7()->firstOrFail();

        // Cek apakah nama undangan sesuai
        $undanganAlt7->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Simpan ucapan
        $alt7Model = new UcapanDesign7();
        $alt7Model->fill($request->validated());
        $undanganAlt7->alt7Models()->save($alt7Model);

        return redirect()->route('wedding-design7-home', [
            'id_weddingdesign7' => $id_weddingdesign7,
            'slug_nama_pasangan' => $slug_nama_pasangan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($id_weddingdesign7, $slug_nama_pasangan)
    {
        // Ambil entri berdasarkan nomor urut
        $informasi = InformasiDesign7::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign7', 'like', 'PDT-WDDS7-%-' . $id_weddingdesign7)
            ->firstOrFail();

        $data = $informasi->KontenDesign7->first();

        return view('admin-design7.home-design7', compact('data'));
    }

    public function showDetail(string $id_weddingdesign7, string $slug_nama_pasangan, string $slug_nama_undangan)
    {
        // Ambil informasi berdasarkan kode unik
        $informasi = InformasiDesign7::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign7', 'like', 'PDT-WDDS7-%-' . $id_weddingdesign7)
            ->firstOrFail();

        // Ambil entri WeddingDesign7 (konten) pertama
        $data = $informasi->KontenDesign7()->first();

        // Ambil nama undangan berdasarkan slug
        $namaUndangan = $data->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Ambil relasi ucapan
        $alt7models = $data->alt7Models()->orderBy('created_at', 'desc')->get();

        // Hitung kehadiran
        $hadirCount = $alt7models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt7models->where('kehadiran', 0)->count();

        return view('wedding-design7.home', compact(
            'data',
            'alt7models',
            'slug_nama_undangan',
            'slug_nama_pasangan',
            'id_weddingdesign7',
            'namaUndangan',
            'hadirCount',
            'tidakHadirCount'
        ));
    }

}
