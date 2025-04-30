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

    public function store(UcapanDesign4FormRequest $request, $slug_nama_mempelai_laki, $slug_nama_mempelai_perempuan, $slug_nama_undangan)
    {
        $undanganAlt4 = WeddingDesign4::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->firstOrFail();

        // Create and save the new UcapanDesign4 model
        $alt4Model = new UcapanDesign4();
        $alt4Model->fill($request->validated());
        $undanganAlt4->alt4Models()->save($alt4Model);

        // For normal redirect
        return redirect()->route('wedding-design4-home', [
            'slug_nama_mempelai_laki' => $slug_nama_mempelai_laki,
            'slug_nama_mempelai_perempuan' => $slug_nama_mempelai_perempuan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($id_weddingdesign4, $slug_nama_pasangan)
    {
        // Jangan ubah slug, langsung pakai apa adanya
        $informasi = InformasiDesign4::where('slug_nama_pasangan', $slug_nama_pasangan)
            ->where('id_weddingdesign4', $id_weddingdesign4)
            ->firstOrFail();

        $data = $informasi->KontenDesign4->first();

        return view('admin-design4.home-design4', compact('data'));
    }
    public function showDetail(string $slug_nama_mempelai_laki, string $slug_nama_mempelai_perempuan, string $slug_nama_undangan)
    {
        $data = WeddingDesign4::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->with(['namaUndangan', 'PerjalananCintaDesign4', 'DirectTransferDesign4', 'KirimHadiahDesign4'])
            ->firstOrFail();

        // Find the specific NamaUndangan by the slug in the relationship
        $namaUndangan = $data->namaUndangan->where('slug_nama_undangan', $slug_nama_undangan)->first();

        $alt4models = $data->alt4Models()->orderBy('created_at', 'desc')->get();

        $hadirCount = $alt4models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt4models->where('kehadiran', 0)->count();

        return view('wedding-design4.home', compact(
            'data',
            'alt4models',
            'slug_nama_mempelai_laki',
            'slug_nama_mempelai_perempuan',
            'slug_nama_undangan',
            'namaUndangan', // Pass the specific NamaUndangan based on the slug
            'hadirCount',
            'tidakHadirCount'
        ));
    }

}
