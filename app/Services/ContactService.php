<?php

namespace App\Services;

use App\Models\Contact;
use App\Models\Person;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactService
{
    public function findOrFail($id): Contact
    {
        return Contact::findOrFail($id);
    }

    public function validate(array $data): array
    {
        return validator($data, [
            'type' => 'required|string|max:50',
            'value' => 'required|string|max:255',
            'main' => 'boolean',
        ])->validate();
    }

    public function store(Person $person, array $data): Contact
    {
        $this->validate($data);

        return Contact::create([
            'person_id' => $person->id,
            'type' => $data['type'],
            'value' => $data['value'],
            'main' => $data['main'] ?? false,
        ]);
    }

    public function update(Contact $contact, array $data): Contact
    {

        $contact->update($this->validate($data));

        return $contact;
    }

    public function delete(Contact $contact): void
    {
        $contact->delete();
    }
}
