<?php

namespace App\Http\Controllers;

use App\Models\Gambarin;
use Illuminate\Http\Request;

class UserGambarinController extends Controller
{
    public function index () {
        $data = Gambarin::orderBy('id' , 'desc')->paginate(20);
        return view('user-gambarin.index', compact('data'));
    }
}
