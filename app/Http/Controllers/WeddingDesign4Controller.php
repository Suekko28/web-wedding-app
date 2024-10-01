<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerjalananCintaDesign4FormRequest;
use App\Http\Requests\WeddingDesign4FormRequest;
use App\Models\InformasiDesign4;
use App\Models\PerjalananCintaDesign4;
use App\Models\WeddingDesign4;
use Illuminate\Http\Request;
use Storage;

class WeddingDesign4Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($informasiDesign4Id)
    {
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        // Menampilkan list undangan yang ada di tabel InformasiDesign4
        $data = PerjalananCintaDesign4::orderBy('id', 'desc')->paginate(10); // Misal paginasi 10 data per halaman
        // Temukan data berdasarkan ID
        return view('admin-design4.create', compact('informasiDesign4Id', 'informasiDesign4', 'data'));  // Kirim data ke view
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(WeddingDesign4FormRequest $request, $informasiDesign4Id)
    {
        // Cek apakah InformasiDesign4 sudah ada
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        $data = $request->all();


        if ($request->hasFile('banner_img')) {
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design4', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design4', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design4', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design4', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            $data['music'] = $request->file('music')->storeAs('public/wedding-design4-music', $request->file('music')->getClientOriginalName());
        }

        if ($request->hasFile('quote_img')) {
            $quoteImages = $request->file('quote_img');
            $quoteImagePaths = [];

            foreach ($quoteImages as $quoteImage) {
                $quoteImagePaths[] = $quoteImage->storeAs('public/wedding-design4', $quoteImage->getClientOriginalName());
            }

            $data['quote_img'] = json_encode($quoteImagePaths); // Store paths as a JSON array or adjust according to your needs
        }

        if ($request->hasFile('akad_img')) {
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design4', $request->file(key: 'akad_img')->getClientOriginalName());
        }

        $data['informasi_design4_id'] = $informasiDesign4->id;

        WeddingDesign4::create($data);



        return redirect()->route('wedding-design4.index', $informasiDesign4Id)->with('success', 'Berhasil menambahkan data');

    }

    public function storePerjalananCinta(PerjalananCintaDesign4FormRequest $request, $informasiDesign4Id)
    {
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);
        $data = $request->all();


        // Handle file uploads
        if ($request->hasFile('image1')) {
            $data['image1'] = $request->file('image1')->store('public/wedding-design4/perjalanancinta', 'public');
        }
        if ($request->hasFile('image2')) {
            $data['image2'] = $request->file('image2')->store('public/wedding-design4/perjalanancinta', 'public');
        }

        $data['informasi_design4_id'] = $informasiDesign4->id;


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
    /**
     * Show the form for editing the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($informasiDesign4Id, $id)
    {
        $data = WeddingDesign4::findOrFail($id);
        $informasiDesign4 = InformasiDesign4::findOrFail($informasiDesign4Id);

        return view('admin-design4.edit', compact('data', 'informasiDesign4'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeddingDesign4FormRequest $request, $informasiDesign4Id, $id)
    {
        $weddingDesign4 = WeddingDesign4::findOrFail($id);
        $data = $request->all();

        // Check and handle uploaded files
        if ($request->hasFile('banner_img')) {
            if ($weddingDesign4->banner_img) {
                Storage::delete($weddingDesign4->banner_img);
            }
            $data['banner_img'] = $request->file('banner_img')->storeAs('public/wedding-design4', $request->file('banner_img')->getClientOriginalName());
        }

        if ($request->hasFile('foto_prewedding')) {
            if ($weddingDesign4->foto_prewedding) {
                Storage::delete($weddingDesign4->foto_prewedding);
            }
            $data['foto_prewedding'] = $request->file('foto_prewedding')->storeAs('public/wedding-design4', $request->file('foto_prewedding')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_laki')) {
            if ($weddingDesign4->foto_mempelai_laki) {
                Storage::delete($weddingDesign4->foto_mempelai_laki);
            }
            $data['foto_mempelai_laki'] = $request->file('foto_mempelai_laki')->storeAs('public/wedding-design4', $request->file('foto_mempelai_laki')->getClientOriginalName());
        }

        if ($request->hasFile('foto_mempelai_perempuan')) {
            if ($weddingDesign4->foto_mempelai_perempuan) {
                Storage::delete($weddingDesign4->foto_mempelai_perempuan);
            }
            $data['foto_mempelai_perempuan'] = $request->file('foto_mempelai_perempuan')->storeAs('public/wedding-design4', $request->file('foto_mempelai_perempuan')->getClientOriginalName());
        }

        if ($request->hasFile('music')) {
            if ($weddingDesign4->music) {
                Storage::delete($weddingDesign4->music);
            }
            $data['music'] = $request->file('music')->storeAs('public/wedding-design4-music', $request->file('music')->getClientOriginalName());
        }

        if ($request->hasFile('quote_img')) {
            // Delete existing quote images if necessary
            if ($weddingDesign4->quote_img) {
                $existingQuoteImages = json_decode($weddingDesign4->quote_img, true);
                foreach ($existingQuoteImages as $existingImage) {
                    Storage::delete($existingImage);
                }
            }

            $quoteImages = $request->file('quote_img');
            $quoteImagePaths = [];

            foreach ($quoteImages as $quoteImage) {
                $quoteImagePaths[] = $quoteImage->storeAs('public/wedding-design4', $quoteImage->getClientOriginalName());
            }

            $data['quote_img'] = json_encode($quoteImagePaths); // Store paths as a JSON array
        }

        if ($request->hasFile('akad_img')) {
            if ($weddingDesign4->akad_img) {
                Storage::delete($weddingDesign4->akad_img);
            }
            $data['akad_img'] = $request->file('akad_img')->storeAs('public/wedding-design4', $request->file('akad_img')->getClientOriginalName());
        }

        $weddingDesign4->update($data);

        return redirect()->route('wedding-design4.index', $informasiDesign4Id)->with('success', 'Data berhasil diperbarui.');
    }


    public function updatePerjalananCinta(PerjalananCintaDesign4FormRequest $request, $informasiDesign4Id, $id)
    {
        $weddingDesign4 = WeddingDesign4::findOrFail($id);
        $data = $request->all();


        // Check and handle uploaded files
        if ($request->hasFile('image1')) {
            if ($weddingDesign4->image1) {
                Storage::delete($weddingDesign4->image1);
            }
            $data['image1'] = $request->file('image1')->storeAs('public/wedding-design4/perjalanancinta', $request->file('image1')->getClientOriginalName());
        }
        // Check and handle uploaded files
        if ($request->hasFile('image2')) {
            if ($weddingDesign4->image1) {
                Storage::delete($weddingDesign4->image1);
            }
            $data['image2'] = $request->file('image2')->storeAs('public/wedding-design4/perjalanancinta', $request->file('image2')->getClientOriginalName());
        }

        $weddingDesign4->update($data);

        return back()->with('success', 'Perjalanan Cinta created successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroyPerjalananCinta(string $id)
    {
        $data = PerjalananCintaDesign4::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil Dihapus');

    }
}
