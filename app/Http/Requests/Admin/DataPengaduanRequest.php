<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DataPengaduanRequest extends FormRequest
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
            'judul' => 'required|string|max:255',
            'pengirim' => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:menunggu,diproses,selesai',
        ];
    }

    public function messages()
    {
        return [
            'judul.required' => 'Nama harus di isi!',
            'deskripsi.required' => 'Deskripsi harus di isi!',
            'status.required' => 'Status harus di isi!',
            'status.in' => 'Nilai status harus menunggu, diproses, atau selesai!',
        ];
    }
}
