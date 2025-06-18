<table id="myTable" class="sm:p-8 bg-white shadow sm:rounded-lg">
    <thead>
        <tr>
            <th>
                <span class="flex items-center">
                    Nome
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                    </svg>
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Email
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                    </svg>
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Telefone
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                    </svg>
                </span>
            </th>
            <th data-type="date" data-format="YYYY/DD/MM">
                <span class="flex items-center">
                    Nascimento
                    <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                    </svg>
                </span>
            </th>

            <th scope="col" class="px-3 py-3 text-left text-xs font-semibold uppercase tracking-wide text-gray-500">
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($people as $person)
            <tr class="hover:bg-blue-100 dark:hover:bg-blue-800 cursor-pointer">

                <td class="font-medium text-black-900 whitespace-nowrap dark:text-white">
                    {{ $person->name }}</td>
                <td>
                    {{ $person->email }}</td>
                <td>
                    {{ $person->phone }}</td>
                <td>
                    {{ $person->birth_date }}</td>

                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900">
                    <a href="{{ route('people.show', $person->id) }}"
                        class="text-gray-600 font-bold hover:text-gray-900 mr-2">{{ __('Show') }}</a>
                    <a href="{{ route('people.edit', $person->id) }}"
                        class="text-indigo-600 font-bold hover:text-indigo-900  mr-2">{{ __('Edit') }}</a>

                    <form action="{{ route('people.destroy', $person->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('people.destroy', $person->id) }}"
                            class="text-red-600 font-bold hover:text-red-900"
                            onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
