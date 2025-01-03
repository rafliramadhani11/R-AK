<?php

namespace App\Http\Requests\Admin;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

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
                'unique:'.User::class,
            ],
            'password' => ['required', 'min:3', 'confirmed'],
            // PROFILE
            'name' => ['required', 'string', 'max:255'],
            'gender' => [
                'required',
                Rule::in(['Laki - Laki', 'Perempuan']),
            ],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string'],
        ];
    }
}
