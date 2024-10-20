<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign4FormRequest;
use Illuminate\Support\Str;
use App\Models\InformasiDesign4;
use App\Models\UcapanDesign4;
use App\Models\WeddingDesign4;
use Illuminate\Http\Request;

class HomeDesign4Controller extends Controller
{

    public function store(UcapanDesign4FormRequest $request, $nama_mempelai_laki, $nama_mempelai_perempuan, $nama_undangan)
    {
        // Temukan undangan berdasarkan nama_mempelai_laki, nama_mempelai_perempuan, dan nama_undangan
        $undanganAlt4 = WeddingDesign4::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->firstOrFail();

        // Buat instance baru dari alt4Model dan isi dengan data yang diberikan
        $alt4Model = new UcapanDesign4();
        $alt4Model->fill($request->validated());

        // Simpan alt4Model ke dalam relasi undanganAlt4$undanganAlt4RSVP pada undanganAlt4$undanganAlt4 yang sesuai
        $undanganAlt4->alt4Models()->save($alt4Model);

        return redirect()->route('wedding-design4-home', [
            'nama_mempelai_laki' => $nama_mempelai_laki,
            'nama_mempelai_perempuan' => $nama_mempelai_perempuan,
            'nama_undangan' => $nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home'); // Menyimpan tab yang aktif (misalnya pills-home)



    }

    public function show($nama_mempelai_laki, $nama_mempelai_perempuan)
    {
        $data = WeddingDesign4::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->firstOrFail();

        return view('admin-design4.home-design4', compact('data'));
    }

    public function showDetail(string $nama_mempelai_laki, string $nama_mempelai_perempuan, string $nama_undangan)
    {
        $data = WeddingDesign4::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->with('PerjalananCintaDesign4')
            ->with('DirectTransferDesign4')
            ->with('KirimHadiahDesign4')
            ->firstOrFail();

        $alt4models = $data->alt4Models()->orderBy('created_at', 'desc')->get();

        $hadirCount = $alt4models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt4models->where('kehadiran', 0)->count();

        return view('wedding-design4.home', compact('data', 'alt4models', 'nama_mempelai_laki', 'nama_mempelai_perempuan', 'nama_undangan', 'hadirCount', 'tidakHadirCount'));
    }



}
