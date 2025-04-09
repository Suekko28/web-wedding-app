<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerjalananCintaDesign5FormRequest extends FormRequest
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
        } else {
            // Jika ini adalah request untuk update, gambar bersifat opsional (nullable)
            $rules['image1'] = ['nullable', 'image', 'mimes:jpeg,png,jpg'];
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

            'image1.required' => 'Gambar wajib diupload',
            'image1.image' => 'Gambar harus berupa file gambar.',
            'image1.mimes' => 'Gambar harus dalam format jpeg, png, atau jpg.',
        ];
    }
}
