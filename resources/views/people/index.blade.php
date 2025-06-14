@extends('layouts.app')

@section('title', 'Lista de Pessoas')

@section('content')

    <div x-data="peopleComponent()" x-init="loadPeople()" class="p-6 bg-white rounded shadow" x-cloak>

        <h2 class="text-2xl font-bold mb-4">Lista de Pessoas</h2>

        <input type="text" x-model="search" placeholder="Buscar em qualquer coluna..."
            class="border border-gray-300 rounded p-2 mb-4 w-full">

        <!-- Botão para abrir o modal -->
        <button @click="showCreatePersonModal = true"
            class="mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
            </svg>

        </button>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Nome</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Telefone</th>
                    <th class="border border-gray-300 px-4 py-2">Nascimento</th>
                    <th class="border border-gray-300 px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="person in filteredPeople" :key="person.id">
                    <tr>
                        <td class="border border-gray-300 px-4 py-2" x-text="person.name"></td>
                        <td class="border border-gray-300 px-4 py-2" x-text="person.email"></td>
                        <td class="border border-gray-300 px-4 py-2" x-text="person.phone"></td>
                        <td class="border border-gray-300 px-4 py-2" x-text="person.birth_date"></td>
                        <td class="border border-gray-300 px-4 py-2 space-x-2">
                            <button @click="openEditModal(person)"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                </svg>
                            </button>
                            <button @click="deletePerson(person.id)"
                                class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                </svg>



                            </button>
                        </td>
                    </tr>
                </template>
                <tr x-show="filteredPeople.length === 0">
                    <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                        Nenhum registro encontrado.
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="mt-4 flex justify-between">
            <button @click="changePage(pagination.prev)" :disabled="!pagination.prev"
                class="px-4 py-2 rounded bg-gray-300 disabled:opacity-50">
                Anterior
            </button>

            <button @click="changePage(pagination.next)" :disabled="!pagination.next"
                class="px-4 py-2 rounded bg-gray-300 disabled:opacity-50">
                Próxima
            </button>
        </div>

        <!-- Modal de Criação -->
        <div x-show="showCreatePersonModal" style="background: rgba(0,0,0,0.5);"
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded shadow-md w-full max-w-lg" @click.away="showCreatePersonModal = false">
                <h2 class="text-xl font-bold mb-4">Nova Pessoa</h2>

                <form @submit.prevent="createPerson">
                    <div class="mb-3">
                        <label class="block">Nome</label>
                        <input type="text" x-model="newPerson.name" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-3">
                        <label class="block">Email</label>
                        <input type="email" x-model="newPerson.email" class="w-full border p-2 rounded" required>
                    </div>

                    <div class="mb-3">
                        <label class="block">Telefone</label>
                        <input type="text" x-model="newPerson.phone" class="w-full border p-2 rounded">
                    </div>

                    <div class="mb-3">
                        <label class="block">Data de Nascimento</label>
                        <input type="date" x-model="newPerson.birth_date" class="w-full border p-2 rounded">
                    </div>

                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="showCreatePersonModal = false"
                            class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                            Cancelar
                        </button>
                        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal para edição -->
        <div x-show="isEditModalOpen" style="background: rgba(0,0,0,0.5);"
            class="fixed inset-0 flex items-center justify-center z-50" x-transition>
            <div class="bg-white rounded shadow-lg p-6 w-full max-w-md" @click.away="closeEditModal()">
                <h3 class="text-xl font-bold mb-4">Editar Pessoa</h3>

                <form @submit.prevent="updatePerson()">
                    <label class="block mb-2">
                        Nome:
                        <input type="text" x-model="editPerson.name" required
                            class="w-full border border-gray-300 rounded p-2" />
                    </label>

                    <label class="block mb-2">
                        Email:
                        <input type="email" x-model="editPerson.email" required
                            class="w-full border border-gray-300 rounded p-2" />
                    </label>

                    <label class="block mb-2">
                        Telefone:
                        <input type="text" x-model="editPerson.phone"
                            class="w-full border border-gray-300 rounded p-2" />
                    </label>

                    <label class="block mb-4">
                        Nascimento:
                        <input type="date" x-model="editPerson.birth_date"
                            class="w-full border border-gray-300 rounded p-2" />
                    </label>

                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="closeEditModal()"
                            class="px-4 py-2 rounded border border-gray-400">Cancelar</button>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function peopleComponent() {
            return {
                search: '',
                people: [],
                pagination: {
                    next: null,
                    prev: null,
                },
                showCreatePersonModal: false,
                isEditModalOpen: false,
                editPerson: {},
                newPerson: { // <-- ADICIONE ESTA LINHA
                    name: '',
                    email: '',
                    phone: '',
                    birth_date: ''
                },

                loadPeople(url = '/api/people') {
                    fetch(url)
                        .then(response => {
                            if (!response.ok) throw new Error('Erro HTTP ' + response.status);
                            return response.json();
                        })
                        .then(data => {
                            this.people = data.data;
                            this.pagination.next = data.links.next;
                            this.pagination.prev = data.links.prev;
                        })
                        .catch(error => {
                            console.error('Erro ao carregar pessoas:', error);
                            this.people = [];
                            this.pagination.next = null;
                            this.pagination.prev = null;
                        });
                },
                changePage(url) {
                    if (url) this.loadPeople(url);
                },
                get filteredPeople() {
                    if (!this.search.trim()) return this.people;

                    const term = this.search.toLowerCase();

                    return this.people.filter(person =>
                        Object.values(person).some(value =>
                            String(value).toLowerCase().includes(term)
                        )
                    );
                },

                openEditModal(person) {
                    this.editPerson = {
                        ...person
                    }; // cria cópia para editar
                    this.isEditModalOpen = true;
                },
                closeEditModal() {
                    this.isEditModalOpen = false;
                    this.editPerson = {};
                },
                createPerson() {
                    Swal.fire({
                        title: 'Salvando...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    fetch('/api/people', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify(this.newPerson),
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Erro HTTP ' + response.status);
                            return response.json();
                        })
                        .then(data => {
                            this.loadPeople(); // atualiza lista
                            this.newPerson = {
                                name: '',
                                email: '',
                                phone: '',
                                birth_date: ''
                            }; // limpa campos
                            this.showCreatePersonModal = false; // fecha modal
                            Swal.fire({
                                icon: 'success',
                                title: 'Pessoa adicionada!',
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        })
                        .catch(error => {
                            console.error('Erro ao adicionar pessoa:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro!',
                                text: 'Não foi possível salvar a pessoa.',
                            });
                        });
                },
                updatePerson() {
                    // Mostra o loading enquanto a requisição está sendo feita
                    Swal.fire({
                        title: 'Atualizando...',
                        text: 'Por favor, aguarde.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    fetch(`/api/people/${this.editPerson.id}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify(this.editPerson),
                        })
                        .then(response => {
                            if (!response.ok) throw new Error('Erro HTTP ' + response.status);
                            return response.json();
                        })
                        .then(data => {
                            this.closeEditModal();
                            this.loadPeople(); // recarrega lista atualizada
                            Swal.fire({
                                icon: 'success',
                                title: 'Atualizado!',
                                text: 'Os dados foram atualizados com sucesso.',
                                timer: 2500,
                                showConfirmButton: false,
                            });
                        })
                        .catch(error => {
                            console.error('Erro ao atualizar pessoa:', error);
                            Swal.fire({
                                icon: 'error',
                                title: 'Erro',
                                text: 'Ocorreu um erro ao atualizar os dados.',
                            });
                        });
                },
                deletePerson(id) {
                    Swal.fire({
                        title: 'Tem certeza?',
                        text: "Você não poderá reverter essa ação!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sim, deletar!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Mostra o loading enquanto a requisição está sendo feita
                            Swal.fire({
                                title: 'Atualizando...',
                                text: 'Por favor, aguarde.',
                                allowOutsideClick: false,
                                didOpen: () => {
                                    Swal.showLoading();
                                }
                            });
                            fetch(`/api/people/${id}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'Accept': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    },
                                })
                                .then(response => {
                                    if (!response.ok) throw new Error('Erro HTTP ' + response.status);
                                    this.loadPeople();
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deletado!',
                                        text: 'Pessoa deletada com sucesso!',
                                        timer: 2500,
                                        showConfirmButton: false,
                                    });
                                })
                                .catch(error => {
                                    console.error('Erro ao deletar pessoa:', error);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Erro',
                                        text: 'Erro ao deletar pessoa.',
                                    });
                                });
                        }
                    });
                },
            }
        }
    </script>
@endsection
