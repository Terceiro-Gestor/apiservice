<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Person;

class PersonContacts extends Component
{
    public $person;
    public $contacts = [];

    // Para controle do modal e formulário
    public $showModal = false;
    public $contactId;
    public $type, $value, $main = false;

    protected $rules = [
        'type' => 'required|string|max:50',
        'value' => 'required|string|max:255',
        'main' => 'boolean',
    ];

    public function mount($person)
    {
        $this->person = $person;
        $this->loadContacts();
    }

    public function loadContacts()
    {
        $this->contacts = $this->person->contacts()->get()->toArray();
    }

    public function openModal($contactId = null)
    {
        $this->resetValidation();
        $this->resetFields();

        if ($contactId) {
            $contact = Contact::findOrFail($contactId);
            $this->contactId = $contact->id;
            $this->type = $contact->type;
            $this->value = $contact->value;
            $this->main = (bool)$contact->main;
        }

        $this->showModal = true;
    }

    public function resetFields()
    {
        $this->contactId = null;
        $this->type = null;
        $this->value = null;
        $this->main = false;
    }

    public function save()
    {

        $this->validate();

        if ($this->contactId) {
            $contact = Contact::findOrFail($this->contactId);
            $contact->update([
                'type' => $this->type,
                'value' => $this->value,
                'main' => $this->main,
            ]);
            $message = "Contato atualizado com sucesso!";
        } else {
            $contact = Contact::create([
                'person_id' => $this->person->id,
                'type' => $this->type,
                'value' => $this->value,
                'main' => $this->main,
            ]);
            $message = "Contato criado com sucesso!";
        }

        $this->loadContacts();
        $this->showModal = false;

        // Emite evento para SweetAlert no JS
        $this->dispatch('swal', [
            'title' => 'Contato salvo!',
            'timer' => 3000,
            'icon' => 'success',
            'showConfirmButton' => false
        ]);
    }
    public function delete($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        $this->loadContacts();
        $this->dispatch('swal', [
            'title' => 'Contato removido com sucesso!',
            'timer' => 3000,
            'icon' => 'success',
            'showConfirmButton' => false
        ]);
    }

    public function render()
    {
        return view('livewire.person-contacts');
    }
}
