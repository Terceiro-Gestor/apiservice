<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    
    public function expectsJson()
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
			'street' => 'string',
			'number' => 'string',
			'complement' => 'string',
			'district' => 'string',
			'city' => 'string',
			'state' => 'string',
			'country' => 'string',
			'postal_code' => 'string',
        ];
    }
}
