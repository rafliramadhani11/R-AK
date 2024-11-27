<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ContractUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'no_contract' => ['required', 'string'],
            'start_contract' => ['required', 'string'],
            'end_contract' => ['required', 'string'],
            'status' => ['required', 'string', Rule::in(['Berjalan', 'Tidak Berjalan'])],
            'salary' => ['required', 'numeric']
        ];
    }
}
