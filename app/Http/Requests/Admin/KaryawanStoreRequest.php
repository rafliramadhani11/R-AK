<?php

namespace App\Http\Requests\Admin;

use Rules\Password;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class KaryawanStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // ACCOUNT
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class
            ],
            'password' => ['required', 'min:3', 'confirmed'],
            // PROFILE
            'name' => ['required', 'string', 'max:255'],
            'gender' => [
                'required',
                Rule::in(['Laki - Laki', 'Perempuan'])
            ],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string'],
            // CONTRACT
            "no_contract" => ['required', 'string'],
            "start_contract" => ['required', 'date'],
            "end_contract" => ['required', 'date'],
            "status" => ['required', Rule::in(['Berjalan', 'Tidak Berjalan'])],
            "salary" => ['required', 'numeric'],
        ];
    }
}
