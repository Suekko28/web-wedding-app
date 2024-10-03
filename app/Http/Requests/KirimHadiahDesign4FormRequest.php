<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KirimHadiahDesign4FormRequest extends FormRequest
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
            'alamat' => [
                'required',
                'max:255',
            ],
            'deskripsi_alamat' => [
                'required',

            ],

        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'alamat.required' => 'Alamat harus diisi.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter.',

            'deskripsi_alamat.required' => 'Alamat Detail harus diisi.',

        ];
    }
}
