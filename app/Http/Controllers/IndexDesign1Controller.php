<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign1FormRequest;
use App\Models\UcapanDesign1;
use App\Models\WeddingDesign1;
use Illuminate\Http\Request;

class IndexDesign1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UcapanDesign1FormRequest $request, $nama_mempelai_laki, $nama_mempelai_perempuan, $nama_undangan)
    {
        // Temukan undangan berdasarkan nama_mempelai_laki, nama_mempelai_perempuan, dan nama_undangan
        $undanganAlt1 = WeddingDesign1::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->firstOrFail();

        // Buat instance baru dari Alt1Model dan isi dengan data yang diberikan
        $alt1Model = new UcapanDesign1();
        $alt1Model->fill($request->validated());

        // Simpan Alt1Model ke dalam relasi undanganAlt1RSVP pada UndanganAlt1 yang sesuai
        $undanganAlt1->alt1Models()->save($alt1Model);

        // Redirect kembali ke halaman showDetail dengan parameter yang sesuai
        return redirect()->route('wedding-design1-index', compact('nama_mempelai_laki', 'nama_mempelai_perempuan', 'nama_undangan'))
            ->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nama_mempelai_laki, string $nama_mempelai_perempuan)
    {
        $data = WeddingDesign1::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->firstOrFail();

        return view('admin-design1.index-design1 ', compact('data', 'nama_mempelai_laki', 'nama_mempelai_perempuan'));
    }

    public function showDetail(string $nama_mempelai_laki, string $nama_mempelai_perempuan, string $nama_undangan)
    {
        $data = WeddingDesign1::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->firstOrFail();

        // Retrieve alt1models related to the UndanganAlt1 instance
        $alt1models = $data->alt1Models;

        // Pass both $data (UndanganAlt1) and $alt1models (related Alt1Model instances) to the view
        return view('wedding-design1.index', compact('data', 'alt1models', 'nama_mempelai_laki', 'nama_mempelai_perempuan', 'nama_undangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
