<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeopleRelationshipRequest extends FormRequest
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
            'person_id' => 'required',
            'full_name'       => ['required', 'string', 'max:255'],
            'birth_date'      => ['required', 'date'],
            'relationship'    => ['required', 'string', 'max:50'],
            'social_name'     => ['nullable', 'string', 'max:255'],
            'gender'          => ['nullable', 'string'],
            'ethnicity'       => ['nullable', 'string'],
            'marital_status'  => ['nullable', 'string'],
            'nis'             => ['nullable', 'string'],
            'cpf'             => ['nullable', 'string'],
            'rg'              => ['nullable', 'string'],
            'country'         => ['nullable', 'string'],
            'state'           => ['nullable', 'string'],
            'city'            => ['nullable', 'string'],
            'photo'         => ['nullable', 'image', 'max:2048'],
        ];
    }
}
