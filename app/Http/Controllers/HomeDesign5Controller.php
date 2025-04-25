<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign5FormRequest;
use App\Models\UcapanDesign5;
use App\Models\WeddingDesign5;
use Illuminate\Http\Request;

class HomeDesign5Controller extends Controller
{
    public function store(UcapanDesign5FormRequest $request, $slug_nama_mempelai_laki, $slug_nama_mempelai_perempuan, $slug_nama_undangan)
    {
        $undanganAlt5 = WeddingDesign5::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->firstOrFail();

        // Create and save the new UcapanDesign5 model
        $alt5Model = new UcapanDesign5();
        $alt5Model->fill($request->validated());
        $undanganAlt5->alt5Models()->save($alt5Model);

        // For normal redirect
        return redirect()->route('wedding-design5-home', [
            'slug_nama_mempelai_laki' => $slug_nama_mempelai_laki,
            'slug_nama_mempelai_perempuan' => $slug_nama_mempelai_perempuan,
            'slug_nama_undangan' => $slug_nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home');
    }

    public function show($slug_nama_mempelai_laki, $slug_nama_mempelai_perempuan)
    {
        $data = WeddingDesign5::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->firstOrFail();

        return view('admin-design5.home-design5', compact('data'));
    }

    public function showDetail(string $slug_nama_mempelai_laki, string $slug_nama_mempelai_perempuan, string $slug_nama_undangan)
    {
        $data = WeddingDesign5::where('slug_nama_mempelai_laki', $slug_nama_mempelai_laki)
            ->where('slug_nama_mempelai_perempuan', $slug_nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($slug_nama_undangan) {
                $query->where('slug_nama_undangan', $slug_nama_undangan);
            })
            ->with(['namaUndangan', 'PerjalananCintaDesign5', 'DirectTransferDesign5', 'KirimHadiahDesign5'])
            ->firstOrFail();

        // Find the specific NamaUndangan by the slug in the relationship
        $namaUndangan = $data->namaUndangan->where('slug_nama_undangan', $slug_nama_undangan)->first();

        $alt5models = $data->alt5Models()->orderBy('created_at', 'desc')->get();

        $hadirCount = $alt5models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt5models->where('kehadiran', 0)->count();

        return view('wedding-design5.home', compact(
            'data',
            'alt5models',
            'slug_nama_mempelai_laki',
            'slug_nama_mempelai_perempuan',
            'slug_nama_undangan',
            'namaUndangan', // Pass the specific NamaUndangan based on the slug
            'hadirCount',
            'tidakHadirCount'
        ));
    }
}
