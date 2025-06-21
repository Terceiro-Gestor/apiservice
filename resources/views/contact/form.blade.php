<div x-data="newcontact()" class="">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-100 dark:text-gray-300">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Tipo</th>
                    <th scope="col" class="px-6 py-3">Valor</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(contact, index) in contacts" :key="index">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <select :id="'type_' + index" :name="'contacts[' + index + '][type]'"
                                x-model="contact.type"
                                class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                                <option value="">Selecione o tipo</option>
                                <option value="Celular">Celular</option>
                                <option value="Telefone">Telefone</option>
                                <option value="Email">Email</option>
                            </select>
                        </td>
                        <td class="px-4 py-2">
                            <input :id="'value_' + index" :name="'contacts[' + index + '][value]'"
                                x-model="contact.value" placeholder="Valor"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                        </td>
                        <td class="px-4 py-2 text-center">
                            <button type="button" @click="removeContact(index)"
                                class="p-2 bg-red-500 text-white rounded-full hover:bg-red-600 transition"
                                x-show="contacts.length > 1" title="Remover contato">
                                <!-- Ícone de lixeira (Heroicons) -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
    <button type="button" @click="addContact"
        class="mt-2 flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition">
        <!-- Ícone de mais (Heroicons) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>

    </button>
</div>


<script>
    function newcontact() {
        return {
            contacts: [{
                type: '',
                value: ''
            }],
            addContact() {
                this.contacts.push({
                    type: '',
                    value: ''
                });
            },
            removeContact(index) {
                if (this.contacts.length > 1) {
                    this.contacts.splice(index, 1);
                }
            }
        }
    }
</script>
