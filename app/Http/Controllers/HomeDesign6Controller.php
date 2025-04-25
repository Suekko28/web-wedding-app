<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign6FormRequest;
use App\Models\UcapanDesign6;
use App\Models\WeddingDesign6;
use Illuminate\Http\Request;

class HomeDesign6Controller extends Controller
{

    public function store(UcapanDesign6FormRequest $request, $slug_nama_mempelai_laki, $slug_nama_mempelai_perempuan, $slug_nama_undangan)
    {
        $undanganAlt6 = WeddingDesign6::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->firstOrFail();

        // Create and save the new UcapanDesign6 model
        $alt6Model = new UcapanDesign6();
        $alt6Model->fill($request->validated());
        $undanganAlt6->alt6Models()->save($alt6Model);

        // For normal redirect
        return redirect()->route('wedding-design6-home', [
            'slug_nama_mempelai_laki' => $slug_nama_mempelai_laki,
            'slug_nama_mempelai_perempuan' => $slug_nama_mempelai_perempuan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($slug_nama_mempelai_laki, $slug_nama_mempelai_perempuan)
    {
        $data = WeddingDesign6::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->firstOrFail();

        return view('admin-design6.home-design6', compact('data'));
    }

    public function showDetail(string $slug_nama_mempelai_laki, string $slug_nama_mempelai_perempuan, string $slug_nama_undangan)
    {
        $data = WeddingDesign6::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->with(['namaUndangan', 'DirectTransferDesign6', 'KirimHadiahDesign6'])
            ->firstOrFail();

        // Find the specific NamaUndangan by the slug in the relationship
        $namaUndangan = $data->namaUndangan->where('slug_nama_undangan', $slug_nama_undangan)->first();

        $alt6models = $data->alt6Models()->orderBy('created_at', 'desc')->get();

        $hadirCount = $alt6models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt6models->where('kehadiran', 0)->count();

        return view('wedding-design6.home', compact(
            'data',
            'alt6models',
            'slug_nama_mempelai_laki',
            'slug_nama_mempelai_perempuan',
            'slug_nama_undangan',
            'namaUndangan', // Pass the specific NamaUndangan based on the slug
            'hadirCount',
            'tidakHadirCount'
        ));
    }
}
