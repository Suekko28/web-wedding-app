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
        $data = Blog::orderBy('id', 'desc');
        return view('user-blog.index', compact('data'));
    }

    public function show(string $id)
    {
        $data = Blog::find($id);
        return view('user-blog.show', compact('data'));
    }


}