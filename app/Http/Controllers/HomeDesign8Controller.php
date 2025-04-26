<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign8FormRequest;
use App\Models\UcapanDesign8;
use App\Models\WeddingDesign8;
use Illuminate\Http\Request;

class HomeDesign8Controller extends Controller
{
    public function store(UcapanDesign8FormRequest $request, $slug_nama_mempelai_laki, $slug_nama_mempelai_perempuan, $slug_nama_undangan)
    {
        $undanganAlt8 = WeddingDesign8::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->firstOrFail();

        // Create and save the new UcapanDesign8 model
        $alt8Model = new UcapanDesign8();
        $alt8Model->fill($request->validated());
        $undanganAlt8->alt8Models()->save($alt8Model);

        // For normal redirect
        return redirect()->route('wedding-design8-home', [
            'slug_nama_mempelai_laki' => $slug_nama_mempelai_laki,
            'slug_nama_mempelai_perempuan' => $slug_nama_mempelai_perempuan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($slug_nama_mempelai_laki, $slug_nama_mempelai_perempuan)
    {
        $data = WeddingDesign8::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->firstOrFail();

        return view('admin-design8.home-design8', compact('data'));
    }

    public function showDetail(string $slug_nama_mempelai_laki, string $slug_nama_mempelai_perempuan, string $slug_nama_undangan)
    {
        $data = WeddingDesign8::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->with(['namaUndangan', 'DirectTransferDesign8', 'KirimHadiahDesign8'])
            ->firstOrFail();

        // Find the specific NamaUndangan by the slug in the relationship
        $namaUndangan = $data->namaUndangan->where('slug_nama_undangan', $slug_nama_undangan)->first();

        $alt8models = $data->alt8Models()->orderBy('created_at', 'desc')->get();

        $hadirCount = $alt8models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt8models->where('kehadiran', 0)->count();

        return view('wedding-design8.home', compact(
            'data',
            'alt8models',
            'slug_nama_mempelai_laki',
            'slug_nama_mempelai_perempuan',
            'slug_nama_undangan',
            'namaUndangan', // Pass the specific NamaUndangan based on the slug
            'hadirCount',
            'tidakHadirCount'
        ));
    }

}
