<?php


namespace App\Livewire\Person;

use Livewire\Component;
use App\Traits\HasNotification;
use Livewire\Attributes\On;
use App\Livewire\Traits\HandlesModals;
use App\Models\Person;

// Livewire\Person\Index.php
class Index extends Component
{   
    use HasNotification, HandlesModals;

    public $people;

    public function mount()
    {
        $this->people = Person::all();
    }

    public function render()
    {
        return view('livewire.person.index');
    }
}
