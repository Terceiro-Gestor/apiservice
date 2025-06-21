<x-app-layout>
    <x-slot name="header">

        <div class="sm:flex sm:items-center">
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

            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a type="button" href="{{ route('people.index') }}"
                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Voltar</a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">

        <form method="POST" action="{{ route('people.update', $person->id) }}" role="form"
            enctype="multipart/form-data">
            @csrf
            {{ method_field('PATCH') }}


            <div x-data="{ step: 1 }" class="grid grid-cols-6 gap-2">


                <div class="">
                    <!-- Stepper ou formulário -->
                    @include('person.stepperside')
                </div>

                <!-- Formulário à direita -->
                <div class="col-span-5 p-6 bg-white rounded-lg shadow-md">

                    <div x-show="step === 1">

                        @include('person.form')

                        <div class="flex justify-end mt-4">
                            <button type="button" @click="step = 2"
                                class="px-4 py-2 bg-indigo-600 text-white rounded">Próximo</button>
                        </div>
                    </div>

                    <div x-show="step === 2" class=''>

                        @include('address.form')

                        <div class="col-span-2 flex justify-between mt-4">
                            <button type="button" @click="step = 1"
                                class="px-4 py-2 bg-gray-300 rounded">Voltar</button>
                            <button type="button" @click="step = 3"
                                class="px-4 py-2 bg-indigo-600 text-white rounded">Próximo</button>
                        </div>

                    </div>

                    <div x-show="step === 3" class="">
                        
                        @include('contact.form')
                        
                        <div class="col-span-2 flex justify-between mt-4">
                            <button type="button" @click="step = 2"
                                class="px-4 py-2 bg-gray-300 rounded">Voltar</button>
                            <button type="button" @click="step = 10"
                                class="px-4 py-2 bg-indigo-600 text-white rounded">Próximo</button>
                        </div>
                    </div>

                    <div x-show="step === 10">
                        <div class="flex justify-between mt-4">

                            <button type="button" @click="step = 3"
                                class="px-4 py-2 bg-gray-300 rounded">Voltar</button>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Salvar</button>
                        </div>
                    </div>

                </div>
            </div>


        </form>

    </div>
</x-app-layout>
