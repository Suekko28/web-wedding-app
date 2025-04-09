<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeserahanFormRequest;
use App\Models\Seserahan;
use Illuminate\Http\Request;
use Storage;

class SeserahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Seserahan::orderBy('id', 'desc')->paginate(4);
        return view('admin-seserahan.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-seserahan.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeserahanFormRequest $request)
    {
        $data = $request->all();
        $userId = auth()->user()->id;
        $image = $request->file('image');
        $nama_image = rand() . $image->hashName();
        $image->storeAs('public/seserahan', $nama_image);

        // Buat ID Seserahan
        $currentDate = date('dmY'); // Mengambil tanggal dengan format Ymd
        $latestSeserahan = Seserahan::orderBy('id', 'desc')->first(); // Mengambil data seserahan terakhir

        // Menentukan urutan ID Seserahan
        if ($latestSeserahan) {
            $lastId = intval(substr($latestSeserahan->id_seserahan, -4)); // Mengambil 4 digit terakhir dari id_seserahan
            $newIdNumber = $lastId + 1; // Menambah 1 dari id terakhir
        } else {
            $newIdNumber = 1; // Jika belum ada data, mulai dari 1
        }

        $idSeserahan = 'PDT-SSH-' . $currentDate . '-' . sprintf('%04d', $newIdNumber); // Format PDT-SSH-Ymd0001

        // Mengisi data untuk disimpan ke database
        $data['user_id'] = $userId;
        $data['image'] = $nama_image;
        $data['id_seserahan'] = $idSeserahan;

        Seserahan::create($data);

        return redirect()->route('seserahan.index')->with('success', 'Data berhasil ditambahkan');
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
        $data = Seserahan::find($id);
        return view('admin-seserahan.edit', [
            "data" => $data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeserahanFormRequest $request, string $id)
    {

        $user = Seserahan::find($id);
        $userId = auth()->user()->id;

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($user->image) {
                Storage::delete('public/seserahan/' . $user->image);
            }

            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension(); // Get the file extension
            $nama_image = time() . '_' . uniqid() . '.' . $extension;

            // Move the uploaded file to the storage location
            $image->storeAs('public/seserahan', $nama_image);

            // Update the image field with the new filename
            $user->update(['image' => $nama_image]);
        }

        // Update other fields based on the request, including the user ID
        $data = $request->except('image');
        $data['user_id'] = $userId; // Add user ID to the data

        $user->update($data);
        return redirect()->route('seserahan.index')->with('success', 'Data berhasil diubah');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Seserahan::findOrFail($id);

        if ($data->image) {
            Storage::delete('public/seserahan/' . $data->image);
        }
        return redirect()->route('seserahan.index')->with('success', 'Berhasil Menghapus Data');
    }
}
