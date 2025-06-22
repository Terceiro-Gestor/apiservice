<form @submit.prevent="submitForm" x-ref="form">
    @csrf
    <div class="">
        <fieldset class="border border-gray-300 rounded p-6 mt-4 grid grid-cols-3 gap-4">
            <legend class="text-sm font-semibold text-gray-700 px-2">Contato</legend>
            
            <input type="hidden" name="person_id" value="{{ $person->id }}">
            
            <select name="type"
                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option value="">Selecione o tipo</option>
                <option value="Celular">Celular</option>
                <option value="Telefone">Telefone</option>
                <option value="Email">Email</option>
                <option value="Whatsapp">Whatsapp</option>
            </select>

            <input name="value" placeholder="Valor"
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />

            <div class="flex items-center ps-4 border border-gray-200 rounded-sm dark:border-gray-700">

                <x-checkbox id="bordered-checkbox-1" name="main">
                </x-checkbox>
                <x-checkbox-label  for="bordered-checkbox-1" value="Principal"></x-checkbox-label>

            </div>
        </fieldset>
    </div>

    <div class="mt-6 flex justify-end">
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Salvar</button>
    </div>
</form>
