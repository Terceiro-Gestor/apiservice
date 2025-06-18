<x-app-layout>
    <x-slot name="header">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Resgitrar') }} Nova Pessoa
                </h2>
                </div>
                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                    <a type="button" href="{{ route('people.index') }}"
                        class="block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Voltar</a>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-1 sm:px-1 lg:px-1 space-y-4">
            <div class="p-1 sm:p-3 bg-white shadow sm:rounded-lg">
                <div class="w-full">


                    <div class="">
                        <div class="mt-4 overflow-x-auto">
                            <div class="">
                                <form method="POST" action="{{ route('people.store') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div x-data="{ step: 1 }" class="flex w-full gap-4">


                                        <div class="flex items-center justify-center min-h-screen">
                                            <!-- Seu conteúdo centralizado aqui -->
                                            <div class="bg-white p-6 rounded shadow">
                                                <!-- Stepper ou formulário -->
                                                @include('person.steps')
                                            </div>
                                        </div>


                                        <!-- Formulário à direita -->
                                        <div class="bg-white rounded shadow w-full p-2">

                                            @include('person.form')
                                            @include('address.form')

                                            <div x-show="step === 3">
                                                <p>Confirmação final...</p>
                                                <div class="flex justify-between mt-4">

                                                    <button type="button" @click="step = 2"
                                                        class="px-4 py-2 bg-gray-300 rounded">Voltar</button>
                                                    <button type="submit"
                                                        class="px-4 py-2 bg-green-600 text-white rounded">Salvar</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
