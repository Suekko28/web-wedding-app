<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UndanganDigitalFormRequest extends FormRequest
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
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'judul' => ['required'],
            'harga' => ['integer', 'required'],
            'link_preview' => ['required'],
            'link_pesan' => ['required'],
            'kategori' => ['required', 'integer'],
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Gambar wajib diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Hanya gambar dengan format jpeg, png, atau jpg yang diperbolehkan.',
            'image.max' => 'Gambar tidak boleh lebih dari 2MB.',
            'judul.required' => 'Judul wajib diisi.',
            'harga.integer' => 'Harga harus berupa angka.',
            'harga.required' => 'Harga wajib diisi.',
            'link_preview.required' => 'Link preview wajib diisi.',
            'link_pesan.required' => 'Link pesan wajib diisi.',
            'kategori.required' => 'Kategori wajib diisi.',
            'kategori.integer' => 'Kategori +harus berupa angka.',
        ];
    }
}