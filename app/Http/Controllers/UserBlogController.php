<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::orderBy('id', 'desc')->paginate(10);
        return view('user-blog.index', compact('data'));
    }

    public function show($id)
    {
        $data = Blog::where('id',$id)
        ->firstOrFail();
        return view('user-blog.show', compact('data'));
    }


}
