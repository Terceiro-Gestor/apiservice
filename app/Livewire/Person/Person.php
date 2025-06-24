<?php

namespace App\Livewire\Person;

use Livewire\Component;
use App\Traits\HasNotification;
use Livewire\Attributes\On;
use App\Livewire\Traits\HandlesModals;
use App\Services\PersonService;

class Person extends Component
{
    use HasNotification, HandlesModals;

    public $person;
    public $contacts = [];
    public $personId;
    public $type, $value, $main = false;

    protected PersonService $contactService;

    public function boot(PersonService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function mount($person)
    {
        $this->person = $person;
        $this->loadPersons();
    }

    public function loadPersons()
    {
        $this->person = $this->person;
    }

    public function resetFields()
    {
        $this->personId = null;
        $this->type = null;
        $this->value = null;
        $this->main = false;
    }

    public function edit($personId = null)
    {
        $this->resetValidation();
        $this->resetFields();

        if ($personId) {
            $contact = $this->contactService->findOrFail($personId);
            $this->personId = $contact->id;
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

        if ($this->personId) {
            $contact = $this->contactService->findOrFail($this->personId);
            $contact = $this->contactService->update($contact, $data);
            $message = "O contato <span class='text-blue-500'>{$contact->value}</span> foi atualizado!";
        } else {
            $contact = $this->contactService->store($this->person, $data);
            $message = "O contato <span class='text-blue-500'>{$contact->value}</span> foi adicionado!";
        }

        $this->loadPersons();
        $this->resetFields();
        $this->closeModal('contact');
        $this->sweetSuccess("Sucesso!", $message);
    }
    public function contactDelete($id)
    {
        // Emite evento para SweetAlert no JS
        $this->sweetConfirm("Atenção!", "Deseja mesmo remover este contato!", $id);
    }

    #[On('confirmDeletePerson')]

    public function confirmDeletePerson($id)
    {

        $contact = $this->contactService->findOrFail($id);

        $this->contactService->delete($contact);

        $this->loadPersons();

        $this->sweetSuccess("Sucesso!", "O contato <span class='text-blue-500'>{$contact->value}</span> foi removido!");
    }

    public function render()
    {
        return view('livewire.person.person');
    }
}
