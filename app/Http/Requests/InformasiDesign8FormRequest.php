<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformasiDesign8FormRequest extends FormRequest
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
            'nama_pasangan' => ['required', 'max:100'],
            'tgl_pernikahan' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'nama_pasangan.required' => 'Nama Pasangan Wajib Diisi',
            'nama_pasangan.max' => 'Nama Pasangan Tidak Boleh Melebihin 100 Karakter',
            'tgl_pernikahan.required' => 'Tanggal Pernikahan Wajib Diisi',
        ];
    }
}
