<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformasiDesign4FormRequest extends FormRequest
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
            'nama_pasangan' => ['required'],
            'tgl_pernikahan' => ['required']
        ];
    }

    public function messages(): array 
    {
        return [
        'nama_pasangan.required' => 'Nama Pasangan Wajib Diisi',
        'tgl_pernikahan.required' => 'Tanggal Pernikahan Wajib Diisi',
    ];
    }
}
