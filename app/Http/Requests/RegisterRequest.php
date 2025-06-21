<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
			'people_id' => 'required',
			'service_id' => 'required',
			'registers_number' => 'required|string',
			'registers_date' => 'required',
			'expiration_reason_id' => 'required',
			'status' => 'required',
			'notes' => 'string',
        ];
    }
}
