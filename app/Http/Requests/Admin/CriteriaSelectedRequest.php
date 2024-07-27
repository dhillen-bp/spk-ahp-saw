<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CriteriaSelectedRequest extends FormRequest
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
            'jumlah_penerima' => 'required',
            'keterangan' => 'string|required',
            'criteria' => 'required|array|min:1',
            'criteria.*' => 'exists:criteria,id',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama kriteria harus di isi!',
            'jumlah_penerima.required' => 'Jumlah penerima harus di isi!',
            'keterangan.required' => 'Keterangan harus di isi!',
            'criteria.required' => 'Minimal pilih satu criteria.',
            'criteria.*.exists' => 'Salah satu criteria yang dipilih tidak valid.',
        ];
    }
}
