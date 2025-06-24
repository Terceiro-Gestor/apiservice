<x-app-layout>

    <div class="">

        <!-- Formulário à direita -->
        <div x-data="tabs()" class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">

            <div class="mb-6">
                @include('person.components.tabs')
            </div>

            <div x-show="step === 1">
                
                <livewire:person.person :person="$person" :key="'person-person-'.$person->id" />

            </div>

            <div x-show="step === 2" class=''>

                <x-address.address-section :person="$person" />

            </div>

            <!--  Contatos -->
            <div x-show="step === 3" class="">

                <livewire:person.components.contacts :person="$person" :key="'person-contacts-'.$person->id" />

            </div>

            <div x-show="step === 4">

            </div>

        </div>

    </div>

    <!--Modal-->



</x-app-layout>
