<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAbsenTodayRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'start' => 'date_format:H:i:s',
            'start_activity' => 'string|min:5',

            'middle' => 'date_format:H:i:s',
            'middle_activity' => 'string|min:5',

            'end' => 'date_format:H:i:s',
            'end_activity' => 'string|min:5',

        ];
    }
}
