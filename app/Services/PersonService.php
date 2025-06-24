<?php

namespace App\Services;

use App\Models\Person;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PersonService
{
    public function findOrFail($id): Person
    {
        return Person::findOrFail($id);
    }

    public function validate(array $data): array
    {
         return validator($data, [
            'photo' => 'nullable|string', // pode ser um path base64 ou url
            'full_name' => 'required|string|max:255',
            'social_name' => 'nullable|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'nullable|string',
            'ethnicity' => 'nullable|string',
            'marital_status' => 'nullable|string',
            'country' => 'nullable|string',
            'state' => 'nullable|string',
            'city' => 'nullable|string',
            'nis' => 'nullable|string|max:20',
            'cpf' => 'required|string|max:14',
            'rg' => 'nullable|string|max:20',
            'address_id' => 'nullable|integer|exists:addresses,id',
        ])->validate();
    }

    public function store(Person $person, array $data): Person
    {
        $this->validate($data);

        return Person::create($this->validate($data));
    }

    public function update(Person $person, array $data): Person
    {

        $person->update($this->validate($data));

        return $person;
    }

    public function delete(Person $person): void
    {
        $person->delete();
    }
}
