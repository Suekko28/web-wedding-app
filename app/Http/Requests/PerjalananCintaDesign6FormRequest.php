<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerjalananCintaDesign6FormRequest extends FormRequest
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
        $method = $this->method();

        if ($method === 'POST') {
            $rules['image'] = ['required', 'array'];
            $rules['image.*'] = ['image', 'mimes:jpeg,png,jpg'];
        } else {
            $rules['image'] = ['nullable', 'array'];
            $rules['image.*'] = ['image', 'mimes:jpeg,png,jpg'];
        }

        return $rules;
    }


    public function messages(): array
    {
        return [

            'image.required' => 'Gambar wajib diupload',
            'image.image' => 'Gambar harus berupa file gambar.',
            'image.mimes' => 'Gambar harus dalam format jpeg, png, atau jpg.',
        ];
    }
}
