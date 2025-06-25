<?php


namespace App\Livewire\Person;

use Livewire\Component;
use App\Traits\HasNotification;
use Livewire\Attributes\On;
use App\Livewire\Traits\HandlesModals;
use App\Models\Person;

class PersonShow extends Component
{
    use HasNotification, HandlesModals;

    public $personId;
    public $editPersonId = null;
    public $person;

    protected $listeners = ['personUpdated' => 'refreshPerson'];

    public function mount($personId)
    {
        $this->personId = $personId;
        $this->refreshPerson();
    }

    public function refreshPerson()
    {
        $this->person = Person::findOrFail($this->personId);
    }

    public function edit($personId){
        $this->dispatch('formEditPerson', $personId);
    }

    public function render()
    {
        return view('livewire.person.show');
    }
}
