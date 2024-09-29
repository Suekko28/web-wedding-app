<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeddingDesign4FormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'banner_img' => ['required', 'image', 'mimes:jpeg,png,jpg',],
            'foto_prewedding' => ['required', 'image', 'mimes:jpeg,png,jpg',],
            'music' => ['required'],
            'foto_mempelai_perempuan' => ['required', 'image', 'mimes:jpeg,png,jpg',],
            'nama_mempelai_perempuan' => ['required', 'string', 'max:255'],
            'putri_dari_bpk' => ['required', 'string', 'max:255'],
            'putri_dari_ibu' => ['required', 'string', 'max:255'],
            'nama_instagram1' => ['string', 'max:255'],
            'link_instagram1' => ['url', 'max:255'],
            'foto_mempelai_laki' => ['required', 'image', 'mimes:jpeg,png,jpg',],
            'nama_mempelai_laki' => ['required', 'string', 'max:255'],
            'putra_dari_bpk' => ['required', 'string', 'max:255'],
            'putra_dari_ibu' => ['required', 'string', 'max:255'],
            'nama_instagram2' => ['string', 'max:255'],
            'link_instagram2' => ['url', 'max:255'],
            'quote' => ['string'],
            'quote_img' => ['required', 'image', 'mimes:jpeg,png,jpg',],
            'akad_img' => ['required', 'image', 'mimes:jpeg,png,jpg',],
            'tgl_akad' => ['required', 'date'],
            'mulai_akad' => ['required', 'date_format:H:i'],
            'selesai_akad' => ['required', 'date_format:H:i', 'after:mulai_akad'],
            'lokasi_akad' => ['required', 'string', 'max:255'],
            'deskripsi_akad' => ['string'],
            'simpan_tgl_akad' => ['required', 'string', 'max:255'],
            'tgl_resepsi' => ['required', 'date'],
            'mulai_resepsi' => ['required', 'date_format:H:i'],
            'selesai_resepsi' => ['required', 'date_format:H:i', 'after:mulai_resepsi'],
            'lokasi_resepsi' => ['required', 'string', 'max:255'],
            'deskripsi_resepsi' => ['string'],
            'simpan_tgl_resepsi' => ['required', 'string', 'max:255'],
            'link_streaming' => ['required', 'max:255'],
            'informasi_design4_id' => ['required', 'exists:informasi_design4,id'],
        ];
    }

    /**
     * Get the validation messages for the defined rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'banner_img.required' => 'Banner harus diunggah.',
            'banner_img.image' => 'Banner harus berupa file gambar.',
            'banner_img.mimes' => 'Banner hanya boleh berupa file dengan format jpeg, png, jpg.',
            'banner_img.max' => 'Ukuran gambar banner tidak boleh lebih dari 2MB.',

            'foto_prewedding.required' => 'Foto prewedding harus diunggah.',
            'foto_prewedding.image' => 'Foto prewedding harus berupa file gambar.',
            'foto_prewedding.mimes' => 'Foto prewedding hanya boleh berupa file dengan format jpeg, png, jpg.',
            'foto_prewedding.max' => 'Ukuran foto prewedding tidak boleh lebih dari 2MB.',

            'music.required' => 'Musik harus diisi.',

            'foto_mempelai_perempuan.required' => 'Foto mempelai perempuan harus diunggah.',
            'foto_mempelai_perempuan.image' => 'Foto mempelai perempuan harus berupa file gambar.',
            'foto_mempelai_perempuan.mimes' => 'Foto mempelai perempuan hanya boleh berupa file dengan format jpeg, png, jpg.',
            'foto_mempelai_perempuan.max' => 'Ukuran foto mempelai perempuan tidak boleh lebih dari 2MB.',

            'nama_mempelai_perempuan.required' => 'Nama mempelai perempuan harus diisi.',
            'nama_mempelai_perempuan.string' => 'Nama mempelai perempuan harus berupa teks.',
            'nama_mempelai_perempuan.max' => 'Nama mempelai perempuan tidak boleh lebih dari 255 karakter.',

            'putri_dari_bpk.required' => 'Nama ayah dari mempelai perempuan harus diisi.',
            'putri_dari_ibu.required' => 'Nama ibu dari mempelai perempuan harus diisi.',

            'nama_instagram1.string' => 'Nama Instagram harus berupa teks.',
            'link_instagram1.url' => 'Link Instagram harus berupa URL yang valid.',

            'foto_mempelai_laki.required' => 'Foto mempelai laki-laki harus diunggah.',
            'foto_mempelai_laki.image' => 'Foto mempelai laki-laki harus berupa file gambar.',
            'foto_mempelai_laki.mimes' => 'Foto mempelai laki-laki hanya boleh berupa file dengan format jpeg, png, jpg.',
            'foto_mempelai_laki.max' => 'Ukuran foto mempelai laki-laki tidak boleh lebih dari 2MB.',

            'nama_mempelai_laki.required' => 'Nama mempelai laki-laki harus diisi.',
            'nama_mempelai_laki.string' => 'Nama mempelai laki-laki harus berupa teks.',
            'nama_mempelai_laki.max' => 'Nama mempelai laki-laki tidak boleh lebih dari 255 karakter.',

            'putra_dari_bpk.required' => 'Nama ayah dari mempelai laki-laki harus diisi.',
            'putra_dari_ibu.required' => 'Nama ibu dari mempelai laki-laki harus diisi.',

            'quote.string' => 'Quote harus berupa teks.',

            'quote_img.required' => 'Gambar quote harus diunggah.',
            'quote_img.image' => 'Gambar quote harus berupa file gambar.',
            'quote_img.mimes' => 'Gambar quote hanya boleh berupa file dengan format jpeg, png, jpg.',
            'quote_img.max' => 'Ukuran gambar quote tidak boleh lebih dari 2MB.',

            'akad_img.required' => 'Gambar akad harus diunggah.',
            'akad_img.image' => 'Gambar akad harus berupa file gambar.',
            'akad_img.mimes' => 'Gambar akad hanya boleh berupa file dengan format jpeg, png, jpg.',
            'akad_img.max' => 'Ukuran gambar akad tidak boleh lebih dari 2MB.',

            'tgl_akad.required' => 'Tanggal akad harus diisi.',
            'tgl_akad.date' => 'Tanggal akad harus berupa format tanggal yang valid.',

            'mulai_akad.required' => 'Waktu mulai akad harus diisi.',
            'mulai_akad.date_format' => 'Waktu mulai akad harus dalam format jam-menit (HH:MM).',
            'selesai_akad.required' => 'Waktu selesai akad harus diisi.',
            'selesai_akad.date_format' => 'Waktu selesai akad harus dalam format jam-menit (HH:MM).',
            'selesai_akad.after' => 'Waktu selesai akad harus setelah waktu mulai akad.',

            'lokasi_akad.required' => 'Lokasi akad harus diisi.',
            'lokasi_akad.string' => 'Lokasi akad harus berupa teks.',
            'lokasi_akad.max' => 'Lokasi akad tidak boleh lebih dari 255 karakter.',

            'deskripsi_akad.string' => 'Deskripsi akad harus berupa teks.',

            'simpan_tgl_akad.required' => 'Simpan tanggal akad harus diisi.',
            'simpan_tgl_akad.string' => 'Simpan tanggal akad harus berupa teks.',
            'simpan_tgl_akad.max' => 'Simpan tanggal akad tidak boleh lebih dari 255 karakter.',

            'tgl_resepsi.required' => 'Tanggal resepsi harus diisi.',
            'tgl_resepsi.date' => 'Tanggal resepsi harus berupa format tanggal yang valid.',

            'mulai_resepsi.required' => 'Waktu mulai resepsi harus diisi.',
            'mulai_resepsi.date_format' => 'Waktu mulai resepsi harus dalam format jam-menit (HH:MM).',
            'selesai_resepsi.required' => 'Waktu selesai resepsi harus diisi.',
            'selesai_resepsi.date_format' => 'Waktu selesai resepsi harus dalam format jam-menit (HH:MM).',
            'selesai_resepsi.after' => 'Waktu selesai resepsi harus setelah waktu mulai resepsi.',

            'lokasi_resepsi.required' => 'Lokasi resepsi harus diisi.',
            'lokasi_resepsi.string' => 'Lokasi resepsi harus berupa teks.',
            'lokasi_resepsi.max' => 'Lokasi resepsi tidak boleh lebih dari 255 karakter.',

            'deskripsi_resepsi.string' => 'Deskripsi resepsi harus berupa teks.',

            'simpan_tgl_resepsi.required' => 'Simpan tanggal resepsi harus diisi.',
            'simpan_tgl_resepsi.string' => 'Simpan tanggal resepsi harus berupa teks.',
            'simpan_tgl_resepsi.max' => 'Simpan tanggal resepsi tidak boleh lebih dari 255 karakter.',

            'link_streaming.required' => 'Link streaming harus diisi.',

            'informasi_design4_id.required' => 'Informasi design harus diisi.',
            'informasi_design4_id.exists' => 'Informasi design tidak valid.',
        ];
    }
}
