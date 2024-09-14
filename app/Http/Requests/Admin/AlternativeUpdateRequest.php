<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlternativeUpdateRequest extends FormRequest
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
        $alternativeId = $this->route('id');

        return [
            'nama' => 'required|string|max:255',
            'nik' => [
                'required',
                'numeric',
                'digits:16',
                // Ignore the current record's NIK when checking for uniqueness
                Rule::unique('alternatives', 'nik')->ignore($alternativeId),
            ],
            'no_kk' => 'required|numeric|digits:16',
            'alamat' => 'required|string|',
            'jenis_kelamin' => 'nullable|in:L,P',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama warga harus di isi!',
            'nik.required' => 'NIK warga harus di isi!',
            'nik.numeric' => 'NIK warga harus berupa angka!',
            'nik.digits' => 'NIK harus terdiri dari 16 digit!',
            'nik.unique' => 'NIK harus UNIK atau tiap warga memiliki NIK berbeda!',
            'no_kk.required' => 'No.  KK warga harus di isi!',
            'no_kk.numeric' => 'No.KK warga harus berupa angka!',
            'no_kk.digits' => 'No KK harus terdiri dari 16 digit!',
            'alamat.required' => 'Alamat harus di isi!',
            'jenis_kelamin.in' => 'Jenis Kelamin harus L (Laki-Laki) atau P (Perempuan)!',
        ];
    }
}
