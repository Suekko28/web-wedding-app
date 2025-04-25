<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign7FormRequest;
use App\Models\UcapanDesign7;
use App\Models\WeddingDesign7;
use Illuminate\Http\Request;

class HomeDesign7Controller extends Controller
{
    public function store(UcapanDesign7FormRequest $request, $slug_nama_mempelai_laki, $slug_nama_mempelai_perempuan, $slug_nama_undangan)
    {
        $undanganAlt7 = WeddingDesign7::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->firstOrFail();

        // Create and save the new UcapanDesign7 model
        $alt7Model = new UcapanDesign7();
        $alt7Model->fill($request->validated());
        $undanganAlt7->alt7Models()->save($alt7Model);

        // For normal redirect
        return redirect()->route('wedding-design7-home', [
            'slug_nama_mempelai_laki' => $slug_nama_mempelai_laki,
            'slug_nama_mempelai_perempuan' => $slug_nama_mempelai_perempuan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($slug_nama_mempelai_laki, $slug_nama_mempelai_perempuan)
    {
        $data = WeddingDesign7::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->firstOrFail();

        return view('admin-design7.home-design7', compact('data'));
    }

    public function showDetail(string $slug_nama_mempelai_laki, string $slug_nama_mempelai_perempuan, string $slug_nama_undangan)
    {
        $data = WeddingDesign7::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->with(['namaUndangan', 'PerjalananCintaDesign7', 'DirectTransferDesign7', 'KirimHadiahDesign7'])
            ->firstOrFail();

        // Find the specific NamaUndangan by the slug in the relationship
        $namaUndangan = $data->namaUndangan->where('slug_nama_undangan', $slug_nama_undangan)->first();

        $alt7models = $data->alt7Models()->orderBy('created_at', 'desc')->get();

        $hadirCount = $alt7models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt7models->where('kehadiran', 0)->count();

        return view('wedding-design7.home', compact(
            'data',
            'alt7models',
            'slug_nama_mempelai_laki',
            'slug_nama_mempelai_perempuan',
            'slug_nama_undangan',
            'namaUndangan', // Pass the specific NamaUndangan based on the slug
            'hadirCount',
            'tidakHadirCount'
        ));
    }

}
