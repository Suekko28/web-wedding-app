<?php

namespace App\Http\Controllers;

use App\Models\Seserahan;
use Illuminate\Http\Request;

class UserSeserahanController extends Controller
{
    public function index () {
        $data = Seserahan::orderBy('id' , 'desc')->paginate(20);
        return view('user-seserahan.index', compact('data'));
    }
}
