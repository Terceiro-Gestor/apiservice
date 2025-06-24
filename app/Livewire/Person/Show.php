<?php


namespace App\Livewire\Person;

use Livewire\Component;
use App\Traits\HasNotification;
use Livewire\Attributes\On;
use App\Livewire\Traits\HandlesModals;
use App\Models\Person;

class Show extends Component
{   
    use HasNotification, HandlesModals;

    public $person;

    public function mount(Person $person)
    {
        $this->person = $person;
    }

    public function render()
    {
        return view('livewire.person.show');
    }
}
