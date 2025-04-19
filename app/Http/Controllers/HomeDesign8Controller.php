<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign8FormRequest;
use App\Models\UcapanDesign8;
use App\Models\WeddingDesign8;
use Illuminate\Http\Request;

class HomeDesign8Controller extends Controller
{
    public function store(UcapanDesign8FormRequest $request, $nama_mempelai_laki, $nama_mempelai_perempuan, $nama_undangan)
    {
        // Temukan undangan berdasarkan nama_mempelai_laki, nama_mempelai_perempuan, dan nama_undangan
        $undanganAlt8 = WeddingDesign8::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->firstOrFail();

        // Buat instance baru dari alt8Model dan isi dengan data yang diberikan
        $alt8Model = new UcapanDesign8();
        $alt8Model->fill($request->validated());

        // Simpan alt8Model ke dalam relasi undanganAlt8$undanganAlt8RSVP pada undanganAlt8$undanganAlt8 yang sesuai
        $undanganAlt8->alt8Models()->save($alt8Model);

        return redirect()->route('wedding-design8-home', [
            'nama_mempelai_laki' => $nama_mempelai_laki,
            'nama_mempelai_perempuan' => $nama_mempelai_perempuan,
            'nama_undangan' => $nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home'); // Menyimpan tab yang aktif (misalnya pills-home)

    }
    public function show($nama_mempelai_laki, $nama_mempelai_perempuan)
    {
        $data = WeddingDesign8::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->firstOrFail();

        return view('admin-design8.home-design8', compact('data'));

    }

    public function showDetail(string $nama_mempelai_laki, string $nama_mempelai_perempuan, string $nama_undangan)
    {
        $data = WeddingDesign8::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->with('DirectTransferDesign8')
            ->with('KirimHadiahDesign8')
            ->firstOrFail();

        $alt8models = $data->alt8Models()->orderBy('created_at', 'desc')->get();

        $hadirCount = $alt8models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt8models->where('kehadiran', 0)->count();

        return view('wedding-design8.home', compact('data', 'alt8models', 'nama_mempelai_laki', 'nama_mempelai_perempuan', 'nama_undangan', 'hadirCount', 'tidakHadirCount'));

    }

}
