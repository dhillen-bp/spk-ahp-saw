<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AlternativeRequest extends FormRequest
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
            'nama' => 'required|string|max:255',
            'nik' => 'string|nullable',
            'alamat' => 'required|string|',
            'kontak' => 'required|string|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama warga harus di isi!',
            'alamat.required' => 'Alamat harus di isi!',
            'kontak.required' => 'Kontak harus di isi!',
            'kontak.numeric' => 'Kontak harus angka!',
        ];
    }
}
