<?php

namespace App\Livewire\Person;

use Livewire\Component;
use App\Traits\HasNotification;
use Livewire\Attributes\On;
use App\Livewire\Traits\HandlesModals;
use App\Services\ContactService;

class Contacts extends Component
{
    use HasNotification, HandlesModals;

    public $person;
    public $contacts = [];
    public $contactId;
    public $type, $value, $main = false;

    protected ContactService $contactService;

    public function boot(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function mount($person)
    {
        $this->person = $person;
        $this->loadContacts();
    }

    public function loadContacts()
    {
        $this->contacts = $this->person->contacts()->get();
    }

    public function resetFields()
    {
        $this->contactId = null;
        $this->type = null;
        $this->value = null;
        $this->main = false;
    }

    public function edit($contactId = null)
    {
        $this->resetValidation();
        $this->resetFields();

        if ($contactId) {
            $contact = $this->contactService->findOrFail($contactId);
            $this->contactId = $contact->id;
            $this->type = $contact->type;
            $this->value = $contact->value;
            $this->main = (bool)$contact->main;
        }
    }

    public function save()
    {
        $data = [
            'type' => $this->type,
            'value' => $this->value,
            'main' => $this->main,
        ];

        if ($this->contactId) {
            $contact = $this->contactService->findOrFail($this->contactId);
            $contact = $this->contactService->update($contact, $data);
            $message = "O contato <span class='text-blue-500'>{$contact->value}</span> foi atualizado!";
        } else {
            $contact = $this->contactService->store($this->person, $data);
            $message = "O contato <span class='text-blue-500'>{$contact->value}</span> foi adicionado!";
        }

        $this->loadContacts();
        $this->resetFields();
        $this->closeModal('contact');
        $this->sweetSuccess("Sucesso!", $message);
    }
    public function contactDelete($id)
    {
        // Emite evento para SweetAlert no JS
        $this->sweetConfirm("Atenção!", "Deseja mesmo remover este contato!", $id);
    }

    #[On('confirmDeleteContact')]

    public function confirmDeleteContact($id)
    {

        $contact = $this->contactService->findOrFail($id);

        $this->contactService->delete($contact);

        $this->loadContacts();

        $this->sweetSuccess("Sucesso!", "O contato <span class='text-blue-500'>{$contact->value}</span> foi removido!");
    }

    public function render()
    {
        return view('livewire.person.contacts');
    }
}
