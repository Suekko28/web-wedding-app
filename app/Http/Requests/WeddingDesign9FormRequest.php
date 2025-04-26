<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WeddingDesign9FormRequest extends FormRequest
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
        $method = $this->method(); // Ambil metode HTTP dari request

        $rules = [
            'nama_mempelai_perempuan' => ['required', 'string', 'max:255'],
            'putri_dari_bpk' => ['required', 'string', 'max:255'],
            'putri_dari_ibu' => ['required', 'string', 'max:255'],
            'nama_instagram1' => ['string', 'max:255', 'nullable'],
            'link_instagram1' => ['url', 'max:255', 'nullable'],
            'nama_mempelai_laki' => ['required', 'string', 'max:255'],
            'putra_dari_bpk' => ['required', 'string', 'max:255'],
            'putra_dari_ibu' => ['required', 'string', 'max:255'],
            'nama_instagram2' => ['string', 'max:255', 'nullable'],
            'link_instagram2' => ['url', 'max:255', 'nullable'],
            'lokasi_akad' => ['required', 'string', 'max:255'],
            'deskripsi_akad' => ['string'],
            'simpan_tgl_akad' => ['required', 'string','max:350'],
            'lokasi_resepsi' => ['required', 'string',],
            'deskripsi_resepsi' => ['string'],
            'simpan_tgl_resepsi' => ['required', 'string','max:350'],
            'link_streaming' => ['nullable', 'max:255'],
            'informasi_design9_id' => ['required', 'exists:informasi_design9,id'],
            'judul_akad' => ['nullable', 'max:255'],
            'tgl_akad' => ['required', 'date'],
            'mulai_akad' => ['required', 'date_format:H:i'],
            'selesai_akad' => ['required', 'date_format:H:i'],
            'judul_resepsi' => ['nullable', 'max:255'],
            'tgl_resepsi' => ['required', 'date'],
            'mulai_resepsi' => ['required', 'date_format:H:i'],
            'selesai_resepsi' => ['required', 'date_format:H:i'],
            'judul_pembuka' => ['required', 'max:255'],
            'deskripsi_pembuka' => ['required'],
            'judul_cinta' => ['nullable', 'max:255'],
            'deskripsi_cinta' => ['nullable'],
            'judul_jadwal' => ['required', 'max:255'],
            'deskripsi_penutup' => ['required'],
            'zona_waktu_akad' => ['required', 'integer', 'in:1,2,3'],
            'zona_waktu_resepsi' => ['required', 'integer', 'in:1,2,3'],
        ];

        // Jika ini adalah request untuk membuat data baru (store), maka gambar wajib di-upload
        if ($method === 'POST') {
            $rules['music'] = ['required'];
            $rules['banner_img'] = ['required', 'image', 'mimes:jpeg,png,jpg'];
            $rules['foto_mempelai_perempuan'] = ['nullable', 'image', 'mimes:jpeg,png,jpg'];
            $rules['foto_mempelai_laki'] = ['nullable', 'image', 'mimes:jpeg,png,jpg'];
            $rules['image_cinta'] = ['nullable', 'array']; // Change to array
            $rules['image_cinta.*'] = ['image', 'mimes:jpeg,png,jpg']; // Validate each image
            $rules['akad_img'] = ['nullable', 'image', 'mimes:jpeg,png,jpg'];
        } else {
            // Jika ini adalah request untuk update, gambar bersifat opsional (nullable)
            $rules['music'] = ['nullable'];
            $rules['banner_img'] = ['nullable', 'image', 'mimes:jpeg,png,jpg'];
            $rules['foto_mempelai_perempuan'] = ['nullable', 'image', 'mimes:jpeg,png,jpg'];
            $rules['foto_mempelai_laki'] = ['nullable', 'image', 'mimes:jpeg,png,jpg'];
            $rules['image_cinta'] = ['nullable', 'array'];
            $rules['image_cinta.*'] = ['image', 'mimes:jpeg,png,jpg'];
            $rules['akad_img'] = ['nullable', 'image', 'mimes:jpeg,png,jpg'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'banner_img.required' => 'Banner harus diunggah.',
            'banner_img.image' => 'Banner harus berupa file gambar.',
            'banner_img.mimes' => 'Banner hanya boleh berupa file dengan format jpeg, png, jpg.',

            'music.required' => 'Musik harus diisi.',

            'foto_mempelai_perempuan.required' => 'Foto mempelai perempuan harus diunggah.',
            'foto_mempelai_perempuan.image' => 'Foto mempelai perempuan harus berupa file gambar.',
            'foto_mempelai_perempuan.mimes' => 'Foto mempelai perempuan hanya boleh berupa file dengan format jpeg, png, jpg.',
            'foto_mempelai_perempuan.max' => 'Ukuran foto mempelai perempuan tidak boleh lebih dari 2MB.',

            'nama_mempelai_perempuan.required' => 'Nama mempelai perempuan harus diisi.',
            'nama_mempelai_perempuan.string' => 'Nama mempelai perempuan harus berupa teks.',

            'putri_dari_bpk.required' => 'Nama ayah dari mempelai perempuan harus diisi.',
            'putri_dari_ibu.required' => 'Nama ibu dari mempelai perempuan harus diisi.',

            'nama_instagram1.string' => 'Nama Instagram harus berupa teks.',
            'link_instagram1.url' => 'Link Instagram harus berupa URL yang valid.',

            'nama_instagram2.string' => 'Nama Instagram harus berupa teks.',
            'link_instagram2.url' => 'Link Instagram harus berupa URL yang valid.',

            'foto_mempelai_laki.required' => 'Foto mempelai laki-laki harus diunggah.',
            'foto_mempelai_laki.image' => 'Foto mempelai laki-laki harus berupa file gambar.',
            'foto_mempelai_laki.mimes' => 'Foto mempelai laki-laki hanya boleh berupa file dengan format jpeg, png, jpg.',

            'nama_mempelai_laki.required' => 'Nama mempelai laki-laki harus diisi.',
            'nama_mempelai_laki.string' => 'Nama mempelai laki-laki harus berupa teks.',

            'putra_dari_bpk.required' => 'Nama ayah dari mempelai laki-laki harus diisi.',
            'putra_dari_ibu.required' => 'Nama ibu dari mempelai laki-laki harus diisi.',

            'image_cinta.image' => 'Gambar perjalanan cinta harus berupa file gambar.',
            'image_cinta.mimes' => 'Gambar perjalanan cinta hanya boleh berupa file dengan format jpeg, png, jpg.',


            'akad_img.required' => 'Gambar akad harus diunggah.',
            'akad_img.image' => 'Gambar akad harus berupa file gambar.',
            'akad_img.mimes' => 'Gambar akad hanya boleh berupa file dengan format jpeg, png, jpg.',

            'tgl_akad.required' => 'Tanggal akad harus diisi.',
            'tgl_akad.date' => 'Tanggal akad harus berupa format tanggal yang valid.',

            'mulai_akad.required' => 'Waktu mulai akad harus diisi.',
            'mulai_akad.date_format' => 'Waktu mulai akad harus dalam format jam-menit.',
            'selesai_akad.required' => 'Waktu selesai akad harus diisi.',
            'selesai_akad.date_format' => 'Waktu selesai akad harus dalam format jam-menit.',

            'lokasi_akad.required' => 'Lokasi akad harus diisi.',
            'lokasi_akad.string' => 'Lokasi akad harus berupa teks.',
            'lokasi_akad.max' => 'Lokasi akad tidak boleh lebih dari 255 karakter.',

            'deskripsi_akad.string' => 'Deskripsi akad harus berupa teks.',

            'simpan_tgl_akad.required' => 'Simpan tanggal akad harus diisi.',
            'simpan_tgl_akad.string' => 'Simpan tanggal akad harus berupa teks.',
            'simpan_tgl_akad.max' => 'Simpan tanggal akad tidak boleh lebih dari 350 karakter.',

            'tgl_resepsi.required' => 'Tanggal resepsi harus diisi.',
            'tgl_resepsi.date' => 'Tanggal resepsi harus berupa format tanggal yang valid.',

            'mulai_resepsi.required' => 'Waktu mulai resepsi harus diisi.',
            'mulai_resepsi.date_format' => 'Waktu mulai resepsi harus dalam format jam-menit.',
            'selesai_resepsi.required' => 'Waktu selesai resepsi harus diisi.',
            'selesai_resepsi.date_format' => 'Waktu selesai resepsi harus dalam format jam-menit.',

            'lokasi_resepsi.required' => 'Lokasi resepsi harus diisi.',
            'lokasi_resepsi.string' => 'Lokasi resepsi harus berupa teks.',
            'lokasi_resepsi.max' => 'Lokasi resepsi tidak boleh lebih dari 255 karakter.',

            'deskripsi_resepsi.string' => 'Deskripsi resepsi harus berupa teks.',

            'simpan_tgl_resepsi.required' => 'Tanggal resepsi harus diisi.',
            'simpan_tgl_resepsi.string' => 'Tanggal resepsi harus berupa teks.',
            'simpan_tgl_resepsi.max' => 'Simpan tanggal resepsi tidak boleh lebih dari 350 karakter.',


            'judul_pembuka.required' => 'Judul ucapan pembuka harus diisi.',
            'deskripsi_pembuka.required' => 'Deskripsi ucapan pembuka harus diisi.',
            'judul_cinta.required' => 'Judul perjalanan cinta harus diisi.',
            'deskripsi_cinta.required' => 'Deskripsi perjalanan cinta harus diisi.',

            'zona_waktu_akad' => 'Zona waktu akad wajib dipilih',
            'zona_waktu_resepsi' => 'Zona waktu resepsi wajib dipilih',

            'informasi_design9_id.required' => 'Informasi design harus diisi.',
            'informasi_design9_id.exists' => 'Informasi design tidak valid.',
        ];
    }
}
