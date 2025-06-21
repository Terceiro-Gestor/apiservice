<x-app-layout>

    <x-slot name="header">
        <div class="sm:flex sm:items-center max-w-full mx-auto sm:px-1 lg:px-2 space-y-6">

            <div class="sm:flex-auto">
            </div>
            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a type="button" href="{{ route('people.index') }}"
                    class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Voltar</a>
            </div>

        </div>
    </x-slot>

    <div class="py-6">

        <form method="POST" action="{{ route('people.store') }}" role="form" enctype="multipart/form-data">
            @csrf

            <div x-data="{ step: 1 }" class="grid grid-cols-6 gap-2">


                <div class="">
                    <!-- Stepper ou formulário -->
                    @include('person.stepperside')
                </div>


                <!-- Formulário à direita -->
                <div class="col-span-5 p-6 bg-white rounded-lg shadow-md">

                    @include('person.form')
                    @include('address.form')
                    @include('contact.form')

                    <div x-show="step === 10" class="flex justify-between mt-4">

                        <button type="button" @click="step = 3" class="px-4 py-2 bg-gray-300 rounded">Voltar</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Salvar</button>

                    </div>

                </div>
            </div>
        </form>
    </div>
</x-app-layout>