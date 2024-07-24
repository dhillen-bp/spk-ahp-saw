<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DataAdminRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'password' => 'required|string',
            'role' => 'required|in:rt_rw,pemerintah_desa',
            'desc' => 'string|nullable',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama harus di isi!',
            'username.required' => 'Username harus di isi!',
            'password.required' => 'Password harus di isi!',
            'role.required' => 'Role harus di isi!',
            'role.in' => 'Nilai role harus Pemerintah Desa atau RT/RW!',
        ];
    }
}
