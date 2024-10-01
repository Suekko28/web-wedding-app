<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerjalananCintaDesign4FormRequest;
use App\Models\PerjalananCintaDesign4;
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
        $data = $request->all();

        // Set the wedding_design4_id from the URL parameter
        $data['wedding_design4_id'] = $weddingDesign4Id;

        // Handle file uploads
        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('images/design4', 'public');
        }
        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->store('images/design4', 'public');
        }

        // Create the PerjalananCintaDesign4 record
        PerjalananCintaDesign4::create($data);

        return back()->with('success', 'Perjalanan Cinta created successfully.');
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
