<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign9FormRequest;
use App\Models\UcapanDesign9;
use App\Models\WeddingDesign9;
use Illuminate\Http\Request;

class HomeDesign9Controller extends Controller
{
    public function store(UcapanDesign9FormRequest $request, $nama_mempelai_laki, $nama_mempelai_perempuan, $nama_undangan)
    {
        // Temukan undangan berdasarkan nama_mempelai_laki, nama_mempelai_perempuan, dan nama_undangan
        $undanganAlt9 = WeddingDesign9::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->firstOrFail();

        // Buat instance baru dari alt9Model dan isi dengan data yang diberikan
        $alt9Model = new UcapanDesign9();
        $alt9Model->fill($request->validated());

        // Simpan alt9Model ke dalam relasi undanganAlt9$undanganAlt9RSVP pada undanganAlt9$undanganAlt9 yang sesuai
        $undanganAlt9->alt9Models()->save($alt9Model);

        return redirect()->route('wedding-design9-home', [
            'nama_mempelai_laki' => $nama_mempelai_laki,
            'nama_mempelai_perempuan' => $nama_mempelai_perempuan,
            'nama_undangan' => $nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home'); // Menyimpan tab yang aktif (misalnya pills-home)

    }
    public function show($nama_mempelai_laki, $nama_mempelai_perempuan)
    {
        $data = WeddingDesign9::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->firstOrFail();

        return view('admin-design9.home-design9', compact('data'));

    }

    public function showDetail(string $nama_mempelai_laki, string $nama_mempelai_perempuan, string $nama_undangan)
    {
        $data = WeddingDesign9::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->with('DirectTransferDesign9')
            ->with('KirimHadiahDesign9')
            ->firstOrFail();

        $alt9models = $data->alt9Models()->orderBy('created_at', 'desc')->get();

        $hadirCount = $alt9models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt9models->where('kehadiran', 0)->count();

        return view('wedding-design9.home', compact('data', 'alt9models', 'nama_mempelai_laki', 'nama_mempelai_perempuan', 'nama_undangan', 'hadirCount', 'tidakHadirCount'));

    }

}
