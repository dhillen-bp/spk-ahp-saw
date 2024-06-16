<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CriteriaStoreRequest extends FormRequest
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
            'nama' => 'string|required|max:255',
            'keterangan' => 'string|nullable',
            'atribut' => 'required|in:benefit,cost',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama kriteria harus di isi!',
            'atribut.required' => 'Atribut harus di isi!',
            'atribut.in' => 'Nilai atribut harus benefit atau cost!',
        ];
    }
}
