<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DirectTransferDesign5FormRequest extends FormRequest
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
            'bank' => [
                'required',
                'max:255',
            ],
            'no_rek' => [
                'required',
                'integer',
            ],
            'nama_rek' => [
                'required',
                'max:255',
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
            'bank.required' => 'Nama bank harus diisi.',
            'bank.string' => 'Nama bank harus berupa teks.',
            'bank.max' => 'Nama bank tidak boleh lebih dari 255 karakter.',

            'no_rek.required' => 'Nomor rekening harus diisi.',
            'no_rek.integer' => 'Nomor rekening harus berupa angka.',

            'nama_rek.required' => 'Nama rekening harus diisi.',
            'nama_rek.string' => 'Nama rekening harus berupa teks.',
            'nama_rek.max' => 'Nama rekening tidak boleh lebih dari 255 karakter.',

        ];
    }
}
