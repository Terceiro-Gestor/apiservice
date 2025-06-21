<table id="myTable" class="">
    <thead>
        <tr>
            <th>
                <span class="flex items-center">
                    Nome
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Email
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Telefone

                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Nascimento
                </span>
            </th>

            <th>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($people as $person)
            <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">

                <td class="font-medium text-black-900 whitespace-nowrap dark:text-white">
                    {{ $person->name }}</td>
                <td>
                    {{ $person->email }}</td>
                <td>
                    {{ $person->phone }}</td>
                <td>
                    {{ $person->birth_date }}</td>

                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">


                    <div class="inline-flex rounded-md shadow-xs" role="group">
                        <button type="button"
                            class="cursor-pointer inline-flex items-center px-4 py-2 text-white bg-green-400 rounded-s-lg hover:bg-green-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                            onclick="window.location.href='{{ route('people.show', $person->id) }}'">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                        </button>

                        <button type="button"
                            class="cursor-pointer inline-flex items-center px-4 py-2 text-white bg-blue-400 hover:bg-blue-500 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                            onclick="window.location.href='{{ route('people.edit', $person->id) }}'">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" class="size-5">
                                <path
                                    d="m5.433 13.917 1.262-3.155A4 4 0 0 1 7.58 9.42l6.92-6.918a2.121 2.121 0 0 1 3 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 0 1-.65-.65Z" />
                                <path
                                    d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0 0 10 3H4.75A2.75 2.75 0 0 0 2 5.75v9.5A2.75 2.75 0 0 0 4.75 18h9.5A2.75 2.75 0 0 0 17 15.25V10a.75.75 0 0 0-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5Z" />
                            </svg>

                        </button>
                        <button type="button"
                            class="cursor-pointer inline-flex items-center px-4 py-2 text-sm text-white bg-red-400 rounded-e-lg hover:bg-red-500 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                            onclick="deletePerson('{{ $person->id }}')">

                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                        </button>

                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    window.deletePerson = async function(id) {
        const result = await Swal.fire({
            title: 'Tem certeza?',
            text: 'Esta ação não pode ser desfeita!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sim, deletar!',
            cancelButtonText: 'Cancelar'
        });
        if (result.isConfirmed) {

            Swal.fire({
                title: 'Atualizando...',
                text: 'Por favor, aguarde.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            const response = await fetch(`/people/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            });

            if (response.ok) {
                Swal.fire({
                    icon: 'success',
                    title: 'Deletado!',
                    text: 'Pessoa deletada com sucesso!',
                    timer: 2000,
                    showConfirmButton: false,
                }).then(() => {
                    location.reload();
                });
            } else {
                console.error('Erro ao deletar pessoa:', response.statusText);
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: 'Erro ao deletar pessoa.',
                });
            }
        }
    }
</script>
