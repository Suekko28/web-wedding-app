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
            'wedding_design4_id' => ['required', 'exists:wedding_design4s,id'],

        ];

        // Jika ini adalah request untuk membuat data baru (store), maka gambar wajib di-upload
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
            'required' => ':attribute Wajib diisi',
            'image' => ':attribute harus berupa file gambar.',
            'mimes' => ':attribute harus dalam format jpeg, png, atau jpg.',
            'date' => ':attribute harus dalam format tanggal yang valid.',

        ];
    }
}
