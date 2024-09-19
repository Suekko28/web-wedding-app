<?php

namespace App\Http\Controllers;

use App\Http\Requests\GambarinFormRequest;
use App\Models\Gambarin;
use Illuminate\Http\Request;
use Storage;

class GambarinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Gambarin::orderBy('id', 'desc')->paginate(10);
        return view('admin-gambarin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-gambarin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GambarinFormRequest $request)
    {
        $data = $request->all();
        $userId = auth()->user()->id;
        $image = $request->file('image');
        $nama_image = rand() . $image->getClientOriginalName();
        $image->storeAs('public/gambarin', $nama_image);
        $currentDate = date('dmY'); // Mengambil tanggal dengan format Ymd
        $latestGambarin = Gambarin::orderBy('id', 'desc')->first(); // Mengambil data seserahan terakhir

        // Menentukan urutan ID Seserahan
        if ($latestGambarin) {
            $lastId = intval(substr($latestGambarin->id_gambarin, -4)); // Mengambil 4 digit terakhir dari id_gambarin
            $newIdNumber = $lastId + 1; // Menambah 1 dari id terakhir
        } else {
            $newIdNumber = 1; // Jika belum ada data, mulai dari 1
        }

        $idGambarin = 'PDT-GMBN-' . $currentDate . '-' . sprintf('%04d', $newIdNumber); // Format PDT-SSH-Ymd0001


        $data['user_id'] = $userId;
        $data['image'] = $nama_image;
        $data['id_gambarin'] = $idGambarin;


        Gambarin::create($data);

        return redirect()->route('gambarin.index')->with('success', 'Data berhasil ditambahkan');

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
        $data = Gambarin::find($id);
        return view('admin-gambarin.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GambarinFormRequest $request, string $id)
    {
        $user = Gambarin::find($id);
        $userId = auth()->user()->id;

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/gambarin' . $user->image);
            }

            $image = $request->file('image');
            $extension = $image->getClientOriginalName();
            $nama_image = time() . '_' . uniqid() . '.' . $extension;

            $image->storeAs('public/gambarin', $nama_image);

            $user->update(['image' => $nama_image]);

        }

        $data = $request->except('image');
        $data['user_id'] = $userId; // Add user ID to the data

        $user->update($data);
        return redirect()->route('gambarin.index')->with('success', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Gambarin::find($id)->delete();
        return redirect()->route('gambarin.index')->with('success', 'Berhasil Menghapus Data');

    }
}
