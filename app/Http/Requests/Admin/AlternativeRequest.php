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
            'nik' => 'required|string',
            'no_kk' => 'required|string',
            'alamat' => 'required|string|',
            'jenis_kelamin' => 'nullable|in:L,P',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama warga harus di isi!',
            'nik.required' => 'NIK warga harus di isi!',
            'no_kk.required' => 'No KK warga harus di isi!',
            'alamat.required' => 'Alamat harus di isi!',
            'jenis_kelamin.in' => 'Jenis Kelamin harus L (Laki-Laki) atau P (Perempuan)!',
        ];
    }
}
