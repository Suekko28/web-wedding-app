<?php

namespace App\Http\Controllers;

use App\Models\InformasiDesign4;
use Illuminate\Http\Request;

class WeddingDesign4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan list undangan yang ada di tabel InformasiDesign4
        $data = InformasiDesign4::paginate(10); // Misal paginasi 10 data per halaman
        return view('admin-design4.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $informasiDesign4 = InformasiDesign4::findOrFail($id);  // Temukan data berdasarkan ID
        return view('admin-design4.create', compact('informasiDesign4'));  // Kirim data ke view
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
