<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WeddingDesign1FormRequest extends FormRequest
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
            // 'nama_undangan' => ['required', 'string', ''],
            'banner_img' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'foto_prewedding' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'foto_mempelai_laki' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'nama_mempelai_laki' => ['required', 'string', 'max:100'],
            'putra_dari_bpk' => ['required', 'string', 'max:100'],
            'putra_dari_ibu' => ['required', 'string', 'max:100'],
            'foto_mempelai_perempuan' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'nama_mempelai_perempuan' => ['required', 'string', 'max:100'],
            'putri_dari_bpk' => ['required', 'string', 'max:100'],
            'putri_dari_ibu' => ['required', 'string', 'max:100'],
            'tgl_akad' => ['required', 'date'],
            'alamat_akad' => ['required', 'string'],
            'tgl_resepsi' => ['required', 'date'],
            'alamat_resepsi' => ['required', 'string'],
            'lokasi_gmaps_akad' => ['required', 'string'],
            'lokasi_gmaps_resepsi' => ['required', 'string'],
            'caption' => ['required', 'string', 'max:100'],
            'galeri_img1' => ['image', 'mimes:jpeg,png,jpg'],
            'galeri_img2' => ['image', 'mimes:jpeg,png,jpg'],
            'galeri_img3' => ['image', 'mimes:jpeg,png,jpg'],
            'galeri_img4' => ['nullable', 'image', 'mimes:jpeg,png,jpg'],
            'galeri_img5' => ['image', 'mimes:jpeg,png,jpg'],
            'galeri_img6' => ['image', 'mimes:jpeg,png,jpg'],
            'pertemuan' => [],
            'pendekatan' => [],
            'lamaran' => [],
            'pernikahan' => [],
            'nama_rek1' => ['', '', 'max:100'],
            'no_rek1' => ['', ''],
            'atas_nama1' => ['', '', 'max:100'],
            'nama_rek2' => ['', '', 'max:100'],
            'no_rek2' => ['', ''],
            'atas_nama2' => ['', '', 'max:100'],
            'nama_rek3' => ['', '', 'max:100'],
            'no_rek3' => ['', ''],
            'atas_nama3' => ['', '', 'max:100'],
            'alamat_tertera' => ['', ''],
            'mulai_akad' => ['required', 'date_format:H:i'],
            'selesai_akad' => ['required', 'date_format:H:i'],
            'mulai_resepsi' => ['required', 'date_format:H:i'],
            'selesai_resepsi' => ['required', 'date_format:H:i'],
            'foto_pertemuan' => ['', 'image', 'mimes:jpeg,png,jpg'],
            'foto_pendekatan' => ['', 'image', 'mimes:jpeg,png,jpg'],
            'foto_lamaran' => ['', 'image', 'mimes:jpeg,png,jpg'],
            'foto_pernikahan' => ['', 'image', 'mimes:jpeg,png,jpg'],
            'music' => ['required', 'mimes:mp3,MP3'],
            'judul_cerita1' => ['', ''],
            'judul_cerita2' => ['', ''],
            'judul_cerita3' => ['', ''],
            'judul_cerita4' => ['', ''],

        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Kolom :attribute wajib diisi.',
            'image' => 'Kolom :attribute harus berupa file gambar.',
            'mimes' => 'Kolom :attribute harus dalam format jpeg, png, atau jpg.',
            'max' => 'Ukuran Kolom :attribute tidak boleh melebihi :max kb.',
            'date' => 'Kolom :attribute harus dalam format tanggal yang valid.',
            'string' => 'Kolom :attribute harus berupa teks.',
            'integer' => 'Kolom :attribute harus berupa angka.',
            'music.required' => 'Bidang musik harus diisi.',
            'music.mimes' => 'Bidang musik harus dalam format MP3.',
            'mulai_akad.date_format' => 'Format :attribute harus sesuai dengan format H:i (jam:menit).',
            'selesai_akad.date_format' => 'Format :attribute harus sesuai dengan format H:i (jam:menit).',
            'mulai_resepsi.date_format' => 'Format :attribute harus sesuai dengan format H:i (jam:menit).',
            'selesai_resepsi.date_format' => 'Format :attribute harus sesuai dengan format H:i (jam:menit).',
        ];
    }
}
