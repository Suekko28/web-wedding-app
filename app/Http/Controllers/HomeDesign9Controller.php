<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign9FormRequest;
use App\Models\UcapanDesign9;
use App\Models\WeddingDesign9;
use Illuminate\Http\Request;

class HomeDesign9Controller extends Controller
{
    public function store(UcapanDesign9FormRequest $request, $slug_nama_mempelai_laki, $slug_nama_mempelai_perempuan, $slug_nama_undangan)
    {
        $undanganAlt9 = WeddingDesign9::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->firstOrFail();

        // Create and save the new UcapanDesign9 model
        $alt9Model = new UcapanDesign9();
        $alt9Model->fill($request->validated());
        $undanganAlt9->alt9Models()->save($alt9Model);

        // For normal redirect
        return redirect()->route('wedding-design9-home', [
            'slug_nama_mempelai_laki' => $slug_nama_mempelai_laki,
            'slug_nama_mempelai_perempuan' => $slug_nama_mempelai_perempuan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($slug_nama_mempelai_laki, $slug_nama_mempelai_perempuan)
    {
        $data = WeddingDesign9::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->firstOrFail();

        return view('admin-design9.home-design9', compact('data'));
    }

    public function showDetail(string $slug_nama_mempelai_laki, string $slug_nama_mempelai_perempuan, string $slug_nama_undangan)
    {
        $data = WeddingDesign9::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->with(['namaUndangan', 'DirectTransferDesign9', 'KirimHadiahDesign9'])
            ->firstOrFail();

        // Find the specific NamaUndangan by the slug in the relationship
        $namaUndangan = $data->namaUndangan->where('slug_nama_undangan', $slug_nama_undangan)->first();

        $alt9models = $data->alt9Models()->orderBy('created_at', 'desc')->get();

        $hadirCount = $alt9models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt9models->where('kehadiran', 0)->count();

        return view('wedding-design9.home', compact(
            'data',
            'alt9models',
            'slug_nama_mempelai_laki',
            'slug_nama_mempelai_perempuan',
            'slug_nama_undangan',
            'namaUndangan', // Pass the specific NamaUndangan based on the slug
            'hadirCount',
            'tidakHadirCount'
        ));
    }

}
