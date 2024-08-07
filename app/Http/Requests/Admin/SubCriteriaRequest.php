<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SubCriteriaRequest extends FormRequest
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
            'criteria_id' => 'nullable|exists:criteria,id',
            'nilai' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama subkriteria harus di isi!',
            'nilai.numeric' => 'Nilai subkriteria harus angka!',
            'criteria_id.exists' => 'Criteria ID harus sesuai dengan data pada tabel criteria!',
        ];
    }
}
