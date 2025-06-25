<?php

namespace App\Livewire\Person;

use Livewire\Component;
use App\Traits\HasNotification;
use Livewire\Attributes\On;
use App\Livewire\Traits\HandlesModals;
use App\Models\Person;

class PersonForm extends Component
{

    use HasNotification, HandlesModals;

    public $form = [];
    public $personId;
    public $person;
    

    protected $listeners = ['formEditPerson' => 'edit'];

    public function mount($personId = null)
    {
        if ($personId) {
            $person = Person::findOrFail($this->personId);
            $this->personId = $person->id;
            $this->form = $person->toArray();
        } else {
            $this->form = Person::make()->getAttributes();
        }
    }

    public function save()
    {
        if ($this->personId) {
            $person = Person::findOrFail($this->personId);
            $person->update($this->form);
            $this->dispatch('personUpdated', $person->id);
            $this->closeModal('updatePerson');
            $this->sweetSuccess("Atualizado!", "<span class='text-green-500'>{$person->full_name}</span> foi atualizado!");
        } else {
            $person = Person::create($this->form);
            $this->dispatch('personCreated', $person->id);
            $this->closeModal('createPerson');
            $this->sweetSuccess("Sucesso!", "<span class='text-blue-500'>{$person->full_name}</span> foi adicionado!");
        }
    }

    public function update($personId = null)
    {

        $this->validate();
        $person = Person::findOrFail($this->personId);
        $person->update($this->form);
        $this->sweetSuccess("Sucesso!", "<span class='text-blue-500'>{$person->full_name}</span> foi atualizado!");
    }

    public function resetForm()
    {   
        $this->personId = null;
        $this->form = [];
    }

    public function edit($personId)
    {

        $this->resetForm();
        
        if ($personId) {
            $person = Person::findOrFail($personId);
            $this->personId = $person->id;
            $this->person = $person;
            $this->form = $person->toArray();
        }else{
            $this->form = [];
        }
    }

    public function render()
    {
        return view('livewire.person.person-form');
    }
}
