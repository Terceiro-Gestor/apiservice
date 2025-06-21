<x-app-layout>
    <x-slot name="header">

        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $person->name }} Person
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


            <div x-data="{ step: 1 }" class="">


                <div class="">
                    <!-- Stepper ou formulário -->
                    @include('person.stepper')
                </div>

                <!-- Formulário à direita -->
                <div class="my-1 p-6 bg-white rounded-lg shadow-md">

                    @include('person.form')
                    @include('address.form')

                    <div x-show="step === 3">
                        <p>Confirmação final...</p>
                        <div class="flex justify-between mt-4">

                            <button type="button" @click="step = 2"
                                class="px-4 py-2 bg-gray-300 rounded">Voltar</button>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Salvar</button>
                        </div>
                    </div>

                </div>
            </div>


        </form>

    </div>
</x-app-layout>
