<table class="table-auto w-full border-collapse border border-gray-300">
    <thead class="bg-gray-100">
        <tr>
            <th @click="sortBy('name')" class="cursor-pointer px-4 py-2">Nome
                <span x-show="sortField === 'name'" x-text="sortAsc ? '▲' : '▼'"></span>
            </th>
            <th @click="sortBy('email')" class="cursor-pointer px-4 py-2">Email
                <span x-show="sortField === 'email'" x-text="sortAsc ? '▲' : '▼'"></span>
            </th>
            <th @click="sortBy('phone')" class="cursor-pointer px-4 py-2">Telefone
                <span x-show="sortField === 'phone'" x-text="sortAsc ? '▲' : '▼'"></span>
            </th>
            <th @click="sortBy('birth_date')" class="cursor-pointer px-4 py-2">Data de Nascimento
                <span x-show="sortField === 'birth_date'" x-text="sortAsc ? '▲' : '▼'"></span>
            </th>
            <th class="border border-gray-300 px-4 py-2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <template x-for="person in sortedPeople" x-for="person in filteredPeople" :key="person.id">
            <tr>
                <td class="border border-gray-300 px-4 py-2" x-text="person.name"></td>
                <td class="border border-gray-300 px-4 py-2" x-text="person.email"></td>
                <td class="border border-gray-300 px-4 py-2" x-text="person.phone"></td>
                <td class="border border-gray-300 px-4 py-2" x-text="person.birth_date"></td>
                <td class="border border-gray-300 px-4 py-2 space-x-2">
                    <button @click="openEditModal(person)"
                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </button>
                    <button @click="deletePerson(person.id)"
                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-4 h-4">
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