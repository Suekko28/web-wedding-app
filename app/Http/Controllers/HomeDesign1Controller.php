<?php

namespace App\Http\Controllers;

use App\Models\WeddingDesign1;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;

class HomeDesign1Controller extends Controller
{
    public function show(string $nama_mempelai_laki, string $nama_mempelai_perempuan)
    {
        $data = WeddingDesign1::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->firstOrFail();
        return view('admin-design1.home-design1', compact('data', 'nama_mempelai_laki', 'nama_mempelai_perempuan'));
    }

    public function showDetail(string $nama_mempelai_laki, string $nama_mempelai_perempuan, string $nama_undangan)
    {
        $data = WeddingDesign1::where('nama_mempelai_laki', $nama_mempelai_laki)
            ->where('nama_mempelai_perempuan', $nama_mempelai_perempuan)
            ->whereHas('namaUndangan', function ($query) use ($nama_undangan) {
                $query->where('nama_undangan', $nama_undangan);
            })
            ->firstOrFail();

        return view('wedding-design1.home', compact('data', 'nama_mempelai_laki', 'nama_mempelai_perempuan', 'nama_undangan'));
    }

}