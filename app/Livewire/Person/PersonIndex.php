<?php


namespace App\Livewire\Person;

use Livewire\Component;
use App\Traits\HasNotification;
use Livewire\Attributes\On;
use App\Livewire\Traits\HandlesModals;
use App\Models\Person;

// Livewire\Person\Index.php
class PersonIndex extends Component
{
    use HasNotification, HandlesModals;

    public $people;

    protected $listeners = [
        'personCreated' => 'refreshList',
    ];

    public function mount()
    {
        $this->refreshList();
    }

    public function refreshList()
    {
        $this->people = Person::orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.person.index');
    }
}
