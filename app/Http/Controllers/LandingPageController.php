<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Promo;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $dataBlog = Blog::orderBy('id', 'desc')->paginate(4);
        $dataPromo = Promo::orderBy('id', 'desc')->paginate(6);
        return view('user-landing.index', compact('dataBlog', 'dataPromo'));
    }
}
