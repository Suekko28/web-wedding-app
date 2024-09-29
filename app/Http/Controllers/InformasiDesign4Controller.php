<?php

namespace App\Http\Controllers;

use App\Http\Requests\InformasiDesign4FormRequest;
use App\Models\InformasiDesign4;
use Illuminate\Http\Request;

class InformasiDesign4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = InformasiDesign4::orderBy('id', 'desc')->with('KontenDesign4')->paginate(10);
        return view('admin-design4.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InformasiDesign4FormRequest $request)
    {
        $data = $request->all();

        $currentDate = date('dmY'); // Mengambil tanggal dengan format Ymd
        $latestWeddingDesign1 = InformasiDesign4::orderBy('id', 'desc')->first(); // Mengambil data seserahan terakhir

        // Menentukan urutan ID Seserahan
        if ($latestWeddingDesign1) {
            $lastId = intval(substr($latestWeddingDesign1->id_weddingdesign4, -4)); // Mengambil 4 digit terakhir dari id_weddingdesign4
            $newIdNumber = $lastId + 1; // Menambah 1 dari id terakhir
        } else {
            $newIdNumber = 1; // Jika belum ada data, mulai dari 1
        }

        $idWeddingDesign4 = 'PDT-WDDS4-' . $currentDate . '-' . sprintf('%04d', $newIdNumber); // Format PDT-SSH-Ymd0001

        $data['id_weddingdesign4'] = $idWeddingDesign4;

        InformasiDesign4::create($data);

        return redirect()->route('wedding-design4.index')->with('success', 'Berhasil menambahkan data');


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
    public function update(InformasiDesign4FormRequest $request, $id)
    {
        $undangan = InformasiDesign4::find($id);

        if (!$undangan) {
            return redirect()->route('wedding-design4.index')->with('error', 'Data undangan tidak ditemukan.');
        }

        $undangan->update($request->all());

        return redirect()->route('wedding-design4.index')->with('success', 'Data undangan berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = InformasiDesign4::find($id)->delete();
        return redirect()->route('wedding-design4.index')->with('success', 'Data berhasil Dihapus');
    }
}
