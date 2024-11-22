<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JobUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jabatan' => ['required', 'min:3'],
            'kegiatan' => ['required', 'min:5'],
            'sub_kegiatan' => ['required', 'min:3'],
            'pask' => ['required', 'min:3'],
        ];
    }
}
