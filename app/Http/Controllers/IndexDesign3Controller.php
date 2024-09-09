<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign3FormRequest;
use App\Models\UcapanDesign3;
use App\Models\WeddingDesign3;
use Illuminate\Http\Request;

class IndexDesign3Controller extends Controller
{
    public function store(UcapanDesign3FormRequest $request, $nama_mempelai_laki, $nama_mempelai_perempuan, $nama_undangan)
    {
        // Temukan undangan berdasarkan nama_mempelai_laki, nama_mempelai_perempuan, dan nama_undangan
        $undanganAlt2 = WeddingDesign3::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->firstOrFail();

        // Buat instance baru dari alt3Model dan isi dengan data yang diberikan
        $alt3Model = new UcapanDesign3();
        $alt3Model->fill($request->validated());

        // Simpan alt3Model ke dalam relasi undanganAlt1RSVP pada UndanganAlt1 yang sesuai
        $undanganAlt2->alt3models()->save($alt3Model);

        // Redirect kembali ke halaman showDetail dengan parameter yang sesuai
        return redirect()->route('wedding-design3-index', compact('nama_mempelai_laki', 'nama_mempelai_perempuan', 'nama_undangan'))
            ->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nama_mempelai_laki, string $nama_mempelai_perempuan)
    {
        $data = WeddingDesign3::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->firstOrFail();

        return view('admin-design3.index-design3 ', compact('data', 'nama_mempelai_laki', 'nama_mempelai_perempuan'));
    }

    public function showDetail(string $nama_mempelai_laki, string $nama_mempelai_perempuan, string $nama_undangan)
    {
        $data = WeddingDesign3::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->firstOrFail();

        // Retrieve alt1models related to the UndanganAlt1 instance
        $alt3Models = $data->alt3Models;

        // Pass both $data (UndanganAlt1) and $alt1models (related Alt1Model instances) to the view
        return view('wedding-design3.index', compact('data', 'alt3Models', 'nama_mempelai_laki', 'nama_mempelai_perempuan', 'nama_undangan'));
    }
}
