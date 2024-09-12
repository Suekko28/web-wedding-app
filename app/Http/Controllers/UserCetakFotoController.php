<?php

namespace App\Http\Controllers;

use App\Models\CetakFoto;
use Illuminate\Http\Request;

class UserCetakFotoController extends Controller
{
    public function index()
    {
        $data = CetakFoto::orderBy('id', 'desc')->paginate(20);
        return view('user-cetakfoto.index', compact('data'));
    }
}
