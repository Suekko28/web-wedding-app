<?php

namespace App\Http\Controllers;

use App\Http\Requests\CetakFotoFormRequest;
use App\Models\CetakFoto;
use Illuminate\Http\Request;
use Storage;

class CetakFotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CetakFoto::orderBy('id', 'desc')->paginate(10);
        return view('admin-cetakfoto.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-cetakfoto.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CetakFotoFormRequest $request)
    {
        $data = $request->all();
        $userId = auth()->user()->id;
        $image = $request->file('image');
        $nama_image = rand() . $image->getClientOriginalName();
        $image->storeAs('public/cetakfoto', $nama_image);

        $data['user_id'] = $userId;
        $data['image'] = $nama_image;

        CetakFoto::create($data);

        return redirect()->route('cetakfoto.index')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = CetakFoto::find($id);
        return view('admin-cetakfoto.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CetakFotoFormRequest $request, string $id)
    {
        $user = CetakFoto::find($id);
        $userId = auth()->user()->id;

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/cetakfoto' . $user->image);
            }

            $image = $request->file('image');
            $extension = $image->getClientOriginalName();
            $nama_image = time() . '_' . uniqid() . '.' . $extension;

            $image->storeAs('public/cetakfoto', $nama_image);

            $user->update(['image' => $nama_image]);

        }

        $data = $request->except('image');
        $data['user_id'] = $userId; // Add user ID to the data

        $user->update($data);
        return redirect()->route('cetakfoto.index')->with('success', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = CetakFoto::find($id)->delete();
        return redirect()->route('cetakfoto.index')->with('success', 'Berhasil Menghapus Data');

    }
}
