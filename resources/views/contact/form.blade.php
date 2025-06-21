<div x-show="step === 3" class="space-y-6">
    <div x-data="newcontact()" class="">
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 rounded">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">Tipo</th>
                        <th class="px-4 py-2 text-left">Valor</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <template x-for="(contact, index) in contacts" :key="index">
                        <tr>
                            <td class="px-4 py-2">
                                <select :id="'type_' + index" :name="'contacts[' + index + '][type]'"
                                    x-model="contact.type" class="border p-2 rounded w-full">
                                    <option value="">Selecione o tipo</option>
                                    <option value="Celular">Celular</option>
                                    <option value="Telefone">Telefone</option>
                                    <option value="Email">Email</option>
                                </select>
                            </td>
                            <td class="px-4 py-2">
                                <input :id="'value_' + index" :name="'contacts[' + index + '][value]'"
                                    x-model="contact.value" class="border p-2 rounded w-full" placeholder="Valor" />
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
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>

        </button>
    </div>

    <div class="col-span-2 flex justify-between mt-4">
        <button type="button" @click="step = 2" class="px-4 py-2 bg-gray-300 rounded">Voltar</button>
        <button type="button" @click="step = 10" class="px-4 py-2 bg-indigo-600 text-white rounded">Próximo</button>
    </div>
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
