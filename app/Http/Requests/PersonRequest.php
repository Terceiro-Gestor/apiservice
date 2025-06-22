<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
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
			'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
			'full_name' => 'required|string',
			'social_name' => 'string',
			'birth_date' => 'required|date',
            'gender' => 'nullable|string',
			'ethnicity' => 'nullable|string',
            'marital_status' => 'nullable|string',
			'country' => 'nullable|string',
			'state' => 'nullable|string',
            'city' => 'nullable|string',
			'nis' => 'nullable|string',
			'cpf' => 'nullable|string',
			'rg' => 'nullable|string',

            /* Address
            'street' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:50',
            'complement' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:20',

            // Contacts
            'contacts' => 'nullable'*/
        ];
    }
}
