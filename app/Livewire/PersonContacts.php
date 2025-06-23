<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Person;
use App\Traits\HasNotification;
use Livewire\Attributes\On;

class PersonContacts extends Component
{
    use HasNotification;

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
        $this->contacts = $this->person->contacts()->get();
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
            $message = "O contato <span class='text-blue-500'>{$contact->value}</span> foi atualizado!";
        } else {
            $contact = Contact::create([
                'person_id' => $this->person->id,
                'type' => $this->type,
                'value' => $this->value,
                'main' => $this->main,
            ]);
            $message = "O contato <span class='text-blue-500'>{$contact->value}</span> foi adicionado!";
        }

        $this->loadContacts();
        $this->showModal = false;

        // Emite evento para SweetAlert no JS
        $this->sweetSuccess("Sucesso!", $message, "success");
    }

    public function render()
    {
        return view('livewire.person-contacts');
    }

    public function contactDelete($id)
    {   
        // Emite evento para SweetAlert no JS
        $this->sweetConfirm("Atenção!", "Deseja mesmo remover este contato!", $id);
    }

    #[On('confirmDeleteContact')]

    public function confirmDeleteContact($id)
    {   

        $contact = Contact::findOrFail($id);
        $contact->delete(); 

        $this->loadContacts();
        $message = "O contato <span class='text-blue-500'>{$contact->value}</span> foi removido!";

        // Emite evento para SweetAlert no JS
        $this->sweetSuccess("Erro!", $message);
    }
}
