<?php



namespace App\Livewire\Person;

use Livewire\Component;
use App\Traits\HasNotification;
use Livewire\Attributes\On;
use App\Livewire\Traits\HandlesModals;
use App\Models\Person;

// Livewire\Person\Form.php
class Form extends Component {

    use HasNotification, HandlesModals;


    public $form = [];
    public $personId;

    public function mount($person = null) {
        if ($person) {
            $this->personId = $person->id;
            $this->form = $person->toArray();
        } else {
            $this->form = [];
        }
    }

    public function save() {

        //$this->validate([...]);

        if ($this->personId) {
            $person = Person::findOrFail($this->personId);
            $person->update($this->form);
        } else {
            Person::create($this->form);
        }

         $this->sweetSuccess("Sucesso!",'Formulario OK!');
    }

    public function render() {
        return view('livewire.person.form');
    }
}
