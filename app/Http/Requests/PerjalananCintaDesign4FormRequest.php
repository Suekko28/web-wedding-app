<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerjalananCintaDesign4FormRequest extends FormRequest
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
        $method = $this->method(); // Ambil metode HTTP dari request (POST untuk create, PUT/PATCH untuk update)

        $rules = [
            'tanggal' => ['required', 'date'],
            'judul_cerita' => ['required'],
            'deskripsi' => ['required'],
            // 'wedding_design4_id' => ['required', 'exists:wedding_design4s,id'],

        ];

        // Jika ini adalah request untuk membuat data baru (store), maka gambar wajib diupload
        if ($method === 'POST') {
            $rules['image1'] = ['required', 'image', 'mimes:jpeg,png,jpg'];
            $rules['image2'] = ['required', 'image', 'mimes:jpeg,png,jpg'];
        } else {
            // Jika ini adalah request untuk update, gambar bersifat opsional (nullable)
            $rules['image1'] = ['nullable', 'image', 'mimes:jpeg,png,jpg'];
            $rules['image2'] = ['nullable', 'image', 'mimes:jpeg,png,jpg'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'tanggal.required' => 'Tanggal wajib diisi.',
            'tanggal.date' => 'Tanggal harus berupa format tanggal yang valid.',

            'judul_cerita.required' => 'Judul cerita wajib diisi.',

            'deskripsi.required' => 'Deskripsi cerita wajib diisi.',

            'image1.required' => 'Gambar 1 wajib diupload',
            'image1.image' => 'Gambar 1 harus berupa file gambar.',
            'image1.mimes' => 'Gambar 1 harus dalam format jpeg, png, atau jpg.',

            'image2.required' => 'Gambar 2 wajib diupload',
            'image2.image' => 'Gambar 2 harus berupa file gambar.',
            'image2.mimes' => 'Gambar 2 harus dalam format jpeg, png, atau jpg.',
        ];
    }

}