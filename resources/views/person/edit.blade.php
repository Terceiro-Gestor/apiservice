<x-app-layout>


    <div class="grid grid-cols-4">

        <div class="">
            <div class="sm:flex-auto">
                <img class="rounded-full w-50 h-50"
                    src="{{ $person->photo ? asset('storage/' . $person->photo) : asset('images/default-user.png') }}"
                    alt="Foto">
            </div>
            <div class="sm:flex-auto">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $person->full_name }}
                </h2>
            </div>
        </div>

        <div class="col-span-3">

            <div x-data="{ step: 1 }" class="">

                <!-- Formulário à direita -->
                <div class="col-span-5 p-6 bg-white rounded-lg shadow-md">

                    <div class="">
                        @include('person.components.tabs')
                    </div>

                    <div x-show="step === 1">
                        <form class="" method="POST" action="{{ route('people.update', $person->id) }}"
                            role="form" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="">

                                <div class="">
                                    @include('person.form')
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <button type="submit"
                                        class="px-4 py-2 bg-green-600 text-white rounded">Salvar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div x-show="step === 2" class=''>

                        <x-address.address-section :person="$person" />

                    </div>

                    <div x-show="step === 3" class="">

                        <livewire:person-contacts :person="$person" />

                    </div>

                    <div x-show="step === 4">
                    </div>

                </div>
            </div>

        </div>

    </div>
</x-app-layout>
