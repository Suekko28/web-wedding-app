<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerjalananCintaDesign4FormRequest;
use App\Models\PerjalananCintaDesign4;
use App\Models\WeddingDesign4;
use Illuminate\Http\Request;

class PerjalananCintaDesign4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($weddingDesign4Id)
    {
        // $weddingDesign4 = WeddingDesign4::findOrFail($weddingDesign4Id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PerjalananCintaDesign4FormRequest $request, $weddingDesign4Id)
    {
        // Find the associated WeddingDesign4
        $weddingDesign4 = WeddingDesign4::findOrFail($weddingDesign4Id);

        // Gather all the input data
        $data = $request->all();

        // Handle the image uploads
        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->storeAs('public/wedding-design4/perjalanan-cinta', $request->file('image1')->getClientOriginalName());
        }

        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->storeAs('public/wedding-design4/perjalanan-cinta', $request->file('image2')->getClientOriginalName());
        }

        // Set the foreign key for the wedding_design4_id
        $data['wedding_design4_id'] = $weddingDesign4->id;

        // Create a new PerjalananCinta entry
        PerjalananCintaDesign4::create($data);

        // Redirect back with success message
        return redirect()->route('form-design4.create', $weddingDesign4Id)
            ->with('success', 'Berhasil menambahkan Perjalanan Cinta');
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
