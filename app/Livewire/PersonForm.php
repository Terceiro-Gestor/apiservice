<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;
use Livewire\Component;
use App\Models\Person;

class PersonForm extends ModalComponent
{
    public $showModal = false;
    public $personId;

    public $name;
    public $email;
    public $birthdate;

    protected $listeners = ['editPerson'];

    public function mount($personId = null)
    {
        $this->personId = $personId;

        if ($personId) {
            $person = Person::findOrFail($personId);
            $this->name = $person->name;
            $this->birthdate = $person->birthdate;
            // e assim por diante
        }
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'birthdate' => 'nullable|date',
        ];
    }

    private function resetFields()
    {
        $this->personId = null;
        $this->name = '';
        $this->email = '';
        $this->birthdate = '';
    }

    public function openModal($personId = null)
    {
        $this->resetValidation();
        $this->resetFields();

        if ($personId) {
            $person = Person::findOrFail($personId);
            $this->personId = $person->id;
        }

        $this->showModal = true;
    }

    public function editPerson($id = null)
    {
        $this->resetValidation();
        $this->resetExcept('showModal');

        $this->showModal = true;

        if ($id) {
            $this->personId = $id;
            $person = Person::findOrFail($id);
            $this->name = $person->name;
            $this->email = $person->email;
            $this->birthdate = $person->birthdate;
        }
    }

    public function save()
    {
        $this->validate();

        Person::updateOrCreate(
            ['id' => $this->personId],
            [
                'name' => $this->name,
                'email' => $this->email,
                'birthdate' => $this->birthdate,
            ]
        );

        $this->dispatchBrowserEvent('swal', [
            [
                'title' => 'Sucesso!',
                'text' => 'Pessoa salva com sucesso.',
                'icon' => 'success',
            ]
        ]);

        $this->showModal = false;

        $this->emitUp('personSaved');
    }

    public function render()
    {
        return view('livewire.person-form');
    }
}
