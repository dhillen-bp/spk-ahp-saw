<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AlternativeValueStoreRequest extends FormRequest
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
            'alternative_id' => 'required|exists:alternatives,id',
            'criteria_values' => 'required|array',
            'criteria_values.*' => 'nullable|numeric',
        ];
    }

    public function messages()
    {
        return [
            'alternative_id.required' => 'Nama Alternatif wajib diisi.',
            'alternative_id.exists' => 'Nama Alternatif yang dipilih tidak valid.',
            'criteria_values.required' => 'Nilai Kriteria wajib diisi.',
            'criteria_values.array' => 'Nilai Kriteria harus berupa array.',
            // 'criteria_values.*.required' => 'Nilai untuk setiap kriteria wajib diisi.',
            'criteria_values.*.numeric' => 'Nilai untuk setiap kriteria harus berupa angka.',
        ];
    }
}
