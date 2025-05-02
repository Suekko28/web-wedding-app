<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign6FormRequest;
use App\Models\InformasiDesign6;
use App\Models\UcapanDesign6;
use App\Models\WeddingDesign6;
use Illuminate\Http\Request;

class HomeDesign6Controller extends Controller
{

    public function store(UcapanDesign6FormRequest $request, string $id_weddingdesign6, string $slug_nama_pasangan, string $slug_nama_undangan)
    {
        // Cari informasi dari InformasiDesign6 berdasarkan slug nama pasangan
        $informasi = InformasiDesign6::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign6', 'like', 'PDT-WDDS6-%-' . $id_weddingdesign6)
            ->firstOrFail();

        // Ambil WeddingDesign6 yang terkait
        $undanganAlt6 = $informasi->KontenDesign6()->firstOrFail();

        // Cek apakah nama undangan sesuai
        $undanganAlt6->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Simpan ucapan
        $alt6Model = new UcapanDesign6();
        $alt6Model->fill($request->validated());
        $undanganAlt6->alt6Models()->save($alt6Model);

        return redirect()->route('wedding-design6-home', [
            'id_weddingdesign6' => $id_weddingdesign6,
            'slug_nama_pasangan' => $slug_nama_pasangan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($id_weddingdesign6, $slug_nama_pasangan)
    {

        // Ambil entri pertama yang sesuai dengan format (tanpa slug untuk sementara)
        $informasi = InformasiDesign6::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign6', 'like', 'PDT-WDDS6-%-' . $id_weddingdesign6)
            ->firstOrFail();

        $data = $informasi->KontenDesign6->first();

        return view('admin-design6.home-design6', compact('data'));
    }

    public function showDetail(string $id_weddingdesign6, string $slug_nama_pasangan, string $slug_nama_undangan)
    {
        // Ambil informasi berdasarkan kode unik
        $informasi = InformasiDesign6::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign6', 'like', 'PDT-WDDS6-%-' . $id_weddingdesign6)
            ->firstOrFail();

        // Ambil entri WeddingDesign6 (konten) pertama
        $data = $informasi->KontenDesign6()->first();

        // Ambil nama undangan berdasarkan slug
        $namaUndangan = $data->namaUndangan()
            ->where('slug_nama_undangan', $slug_nama_undangan)
            ->firstOrFail();

        // Ambil relasi ucapan
        $alt6models = $data->alt6Models()->orderBy('created_at', 'desc')->get();

        // Hitung kehadiran
        $hadirCount = $alt6models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt6models->where('kehadiran', 0)->count();

        return view('wedding-design6.home', compact(
            'data',
            'alt6models',
            'slug_nama_undangan',
            'slug_nama_pasangan',
            'id_weddingdesign6',
            'namaUndangan',
            'hadirCount',
            'tidakHadirCount'
        ));
    }
}
