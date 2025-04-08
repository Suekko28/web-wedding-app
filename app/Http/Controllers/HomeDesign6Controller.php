<?php

namespace App\Http\Controllers;

use App\Http\Requests\UcapanDesign6FormRequest;
use App\Models\WeddingDesign6;
use Illuminate\Http\Request;

class HomeDesign6Controller extends Controller
{

    public function store(UcapanDesign6FormRequest $request, $nama_mempelai_laki, $nama_mempelai_perempuan, $nama_undangan)
    {
        // Temukan undangan berdasarkan nama_mempelai_laki, nama_mempelai_perempuan, dan nama_undangan
        $undanganAlt5 = WeddingDesign6::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->firstOrFail();

        // Buat instance baru dari alt5Model dan isi dengan data yang diberikan
        $alt5Model = new UcapanDesign5();
        $alt5Model->fill($request->validated());

        // Simpan alt5Model ke dalam relasi undanganAlt5$undanganAlt5RSVP pada undanganAlt5$undanganAlt5 yang sesuai
        $undanganAlt5->alt5Models()->save($alt5Model);

        return redirect()->route('wedding-design5-home', [
            'nama_mempelai_laki' => $nama_mempelai_laki,
            'nama_mempelai_perempuan' => $nama_mempelai_perempuan,
            'nama_undangan' => $nama_undangan,
        ])->with('success', 'Berhasil menambahkan doa ucapan')
            ->with('hide_offcanvas', true)
            ->with('activeTab', 'pills-home'); // Menyimpan tab yang aktif (misalnya pills-home)

    }
    public function show($nama_mempelai_laki, $nama_mempelai_perempuan)
    {
        $data = WeddingDesign6::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->with('PerjalananCintaDesign6')
            ->firstOrFail();

        return view('admin-design6.home-design6', compact('data'));

    }

    public function showDetail(string $nama_mempelai_laki, string $nama_mempelai_perempuan, string $nama_undangan)
    {
        $data = WeddingDesign6::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->with('PerjalananCintaDesign6')
            ->with('DirectTransferDesign6')
            ->with('KirimHadiahDesign6')
            ->firstOrFail();

        $alt6models = $data->alt6Models()->orderBy('created_at', 'desc')->get();

        $hadirCount = $alt6models->where('kehadiran', 1)->count();
        $tidakHadirCount = $alt6models->where('kehadiran', 0)->count();

        return view('wedding-design6.home', compact('data', 'alt6models', 'nama_mempelai_laki', 'nama_mempelai_perempuan', 'nama_undangan', 'hadirCount', 'tidakHadirCount'));

    }
}
