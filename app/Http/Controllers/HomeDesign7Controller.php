<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign7FormRequest;
use App\Models\UcapanDesign7;
use App\Models\WeddingDesign7;
use Illuminate\Http\Request;

class HomeDesign7Controller extends Controller
{
    public function store(UcapanDesign7FormRequest $request, $nama_mempelai_laki, $nama_mempelai_perempuan, $nama_undangan)
    {
        // Temukan undangan berdasarkan nama_mempelai_laki, nama_mempelai_perempuan, dan nama_undangan
        $undanganAlt7 = WeddingDesign7::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->firstOrFail();

        // Buat instance baru dari alt7Model dan isi dengan data yang diberikan
        $alt7Model = new UcapanDesign7();
        $alt7Model->fill($request->validated());

        // Simpan alt7Model ke dalam relasi undanganAlt7$undanganAlt7RSVP pada undanganAlt7$undanganAlt7 yang sesuai
        $undanganAlt7->alt7Models()->save($alt7Model);

        return redirect()->route('wedding-design7-home', [
            'nama_mempelai_laki' => $nama_mempelai_laki,
            'nama_mempelai_perempuan' => $nama_mempelai_perempuan,
            'nama_undangan' => $nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home'); // Menyimpan tab yang aktif (misalnya pills-home)

    }
    public function show($nama_mempelai_laki, $nama_mempelai_perempuan)
    {
        $data = WeddingDesign7::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->firstOrFail();

        return view('admin-design7.home-design7', compact('data'));

    }

    public function showDetail(string $nama_mempelai_laki, string $nama_mempelai_perempuan, string $nama_undangan)
    {
        $data = WeddingDesign7::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->with('DirectTransferDesign7')
            ->with('KirimHadiahDesign7')
            ->firstOrFail();

        $alt7models = $data->alt7Models()->orderBy('created_at', 'desc')->get();

        $hadirCount = $alt7models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt7models->where('kehadiran', 0)->count();

        return view('wedding-design7.home', compact('data', 'alt7models', 'nama_mempelai_laki', 'nama_mempelai_perempuan', 'nama_undangan', 'hadirCount', 'tidakHadirCount'));

    }

}
