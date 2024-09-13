<?php

namespace App\Http\Controllers;

use App\Models\UndanganDigital;
use Illuminate\Http\Request;

class UserUndanganDigitalController extends Controller
{
    public function index()
    {
        $dataUndanganPernikahan = UndanganDigital::where('kategori', '1')->paginate(20);
        $dataUlangTahun = UndanganDigital::where('kategori', '2')->paginate(20);
        $dataSeminar = UndanganDigital::where('kategori', '3')->paginate(20);
        $dataAkikah = UndanganDigital::where('kategori', '4')->paginate(20);

        return view('user-undangandigital.index', compact('dataUndanganPernikahan', 'dataUlangTahun', 'dataSeminar', 'dataAkikah'));
    }




}
