@extends('layouts.app')

@section('title', 'Lista de Pessoas')

@section('content')

    <div x-data="peopleComponent()" x-init="loadPeople()" class="p-6 bg-white rounded shadow" x-cloak>

        <div class="flex flex-row">
            <div>
                <input type="text" x-model="search" placeholder="Buscar em qualquer coluna..."
                    class="border border-gray-300 rounded p-2 mb-4">
            </div>
        </div>


        <!-- Botão para abrir o modal -->
        <button @click="showCreatePersonModal = true"
            class="mb-4 bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
            </svg>

        </button>


        @include('people.table-people')
        @include('people.create-modal')
        @include('people.edit-modal')
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
                sortBy(field) {
                    if (this.sortField === field) {
                        this.sortAsc = !this.sortAsc;
                    } else {
                        this.sortField = field;
                        this.sortAsc = true;
                    }
                },
                get sortedPeople() {
                    let arr = [...this.filteredPeople];
                    if (!this.sortField) return arr;
                    return arr.sort((a, b) => {
                        let fa = a[this.sortField] ?? '';
                        let fb = b[this.sortField] ?? '';
                        if (fa < fb) return this.sortAsc ? -1 : 1;
                        if (fa > fb) return this.sortAsc ? 1 : -1;
                        return 0;
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
