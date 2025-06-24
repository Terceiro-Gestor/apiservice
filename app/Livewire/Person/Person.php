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
    public $personId;
    public $form = [];

    protected PersonService $personService;

    public function boot(PersonService $personService)
    {
        $this->personService = $personService;
    }


    public function mount($person = null)
    {
        if ($person) {
            $this->person = $person;
            $this->personId = $person->id;
            $this->form = $person->toArray();
        } else {
            $this->person = null;
            $this->resetForm();
        }
    }

    public function loadPersons()
    {
        if ($this->personId) {
            $this->person = $this->personService->findOrFail($this->personId);
            $this->form = $this->person->toArray();
        }
    }

    public function resetForm()
    {
        $this->personId = null;
        $this->form = [];
    }

    public function edit($personId = null)
    {
        $this->resetForm();

        if ($personId) {
            $person = $this->personService->findOrFail($personId);
            $this->personId = $person->id;
            $this->person = $person;
            $this->form = $person->toArray();
        }
    }

    public function save()
    {
        $data = $this->form;

        if ($this->personId) {
            $person = $this->personService->findOrFail($this->personId);
            $person = $this->personService->update($person, $data);
            $message = "O contato <span class='text-blue-500'>{$person->full_name}</span> foi atualizado!";
        } else {
            $person = $this->personService->store($this->person, $data);
            $this->personId = $person->id;
            $message = "O contato <span class='text-blue-500'>{$person->full_name}</span> foi adicionado!";
        }

        $this->loadPersons();
        $this->resetForm();
        $this->closeModal('person');
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

        $person = $this->personService->findOrFail($id);

        $this->personService->delete($person);

        if ($this->personId === $id) {
            $this->resetForm();
            $this->person = null;
            $this->personId = null;
        }

        $this->sweetSuccess("Sucesso!", "O contato <span class='text-blue-500'>{$person->full_name}</span> foi removido!");
    }

    public function render()
    {
        return view('livewire.person.person');
    }
}
