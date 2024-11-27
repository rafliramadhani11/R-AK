<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", 'min:3', 'string'],
            "email" => ['email', 'required', 'min:5'],
            "gender" => [Rule::in(['Laki - Laki', 'Perempuan']), 'required'],
            "phone" => ['required', 'numeric'],
            "address" => ['string', 'required'],
            "position_id" => ['required'],
            "job_place" => ['required'],
        ];
    }
}
