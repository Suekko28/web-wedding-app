<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DresscodeDesign10FormRequest extends FormRequest
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
            'judul_dresscode' => ['required'],
            'deskripsi_dresscode' => ['required'],

        ];

        // Jika ini adalah request untuk membuat data baru (store), maka gambar wajib diupload
        if ($method === 'POST') {
            $rules['image'] = ['required', 'image', 'mimes:jpeg,png,jpg'];
        } else {
            // Jika ini adalah request untuk update, gambar bersifat opsional (nullable)
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg'];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [

            'judul_dresscode.required' => 'Judul cerita wajib diisi.',

            'deskripsi_dresscode.required' => 'Deskripsi cerita wajib diisi.',

            'image.required' => 'Gambar wajib diupload',
            'image.image' => 'Gambar harus berupa file gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, atau jpg.',
        ];
    }
}
