<?php

namespace App\Http\Controllers;

use App\Http\Requests\UndanganDigitalFormRequest;
use App\Models\UndanganDigital;
use Illuminate\Http\Request;
use Storage;

class UndanganDigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = UndanganDigital::orderBy('id', 'desc')->paginate(10);
        return view('admin-undangandigital.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-undangandigital.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UndanganDigitalFormRequest $request)
    {
        $data = $request->all();
        $userId = auth()->user()->id;
        $image = $request->file('image');
        $nama_image = rand() . $image->hashName();
        $image->storeAs('public/undangandigital', $nama_image);
        $currentDate = date('dmY'); // Mengambil tanggal dengan format Ymd
        $latestUndanganDigital = UndanganDigital::orderBy('id', 'desc')->first(); // Mengambil data seserahan terakhir

        // Menentukan urutan ID Seserahan
        if ($latestUndanganDigital) {
            $lastId = intval(substr($latestUndanganDigital->id_undangandigital, -4)); // Mengambil 4 digit terakhir dari id_undangandigital
            $newIdNumber = $lastId + 1; // Menambah 1 dari id terakhir
        } else {
            $newIdNumber = 1; // Jika belum ada data, mulai dari 1
        }

        $idUndanganDigital = 'PDT-UNDGL-' . $currentDate . '-' . sprintf('%04d', $newIdNumber); // Format PDT-SSH-Ymd0001


        $data['user_id'] = $userId;
        $data['image'] = $nama_image;
        $data['id_undangandigital'] = $idUndanganDigital;


        UndanganDigital::create($data);

        return redirect()->route('undangandigital.index')->with('success', 'Data berhasil ditambahkan');

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
        $data = UndanganDigital::find($id);
        return view('admin-undangandigital.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UndanganDigitalFormRequest $request, string $id)
    {
        $user = UndanganDigital::find($id);
        $userId = auth()->user()->id;

        if ($request->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/undangandigital' . $user->image);
            }

            $image = $request->file('image');
            $extension = $image->hashName();
            $nama_image = time() . '_' . uniqid() . '.' . $extension;

            $image->storeAs('public/undangandigital', $nama_image);

            $user->update(['image' => $nama_image]);

        }

        $data = $request->except('image');
        $data['user_id'] = $userId; // Add user ID to the data

        $user->update($data);
        return redirect()->route('undangandigital.index')->with('success', 'Data berhasil diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = UndanganDigital::findOrFail($id);

        if ($data->image) {
            Storage::delete('public/undangandigital/' . $data->image);
        }
 
        $data->delete();

        return redirect()->route('undangandigital.index')->with('success', 'Berhasil Menghapus Data');

    }
}
