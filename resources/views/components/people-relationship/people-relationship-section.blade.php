<div x-data="personContactsComponent()" x-init="initContacts(@js($person->contacts))">

    <div class="mb-4">

        <button @click="$dispatch('open-modal', 'modal-family')" class="bg-indigo-600 text-white px-4 py-2 rounded">
            Adicionar Familiar
        </button>

        <x-main-modal id="modal-family" title="Cadastrar Novo Familiar" width="w-[80vw]" height="h-[90vh]">
            @include('person.form-family')
        </x-main-modal>
    </div>

    <!-- Tabela com contatos -->
    <template x-if="contacts.length > 0">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">Tipo</th>
                    <th class="px-6 py-3">Valor</th>
                    <th class="px-6 py-3">Principal</th>
                    <th class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(contact, index) in contacts" :key="contact.id ?? index">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="px-6 py-4" x-text="contact.type"></td>
                        <td class="px-6 py-4">
                            <template x-if="contact.type === 'WhatsApp'">
                                <a :href="`https://wa.me/${contact.value.replace(/\D/g, '')}`"
                                    class="text-green-600 hover:underline" target="_blank">
                                    <span x-text="contact.value"></span>
                                </a>
                            </template>

                            <template x-if="contact.type !== 'WhatsApp'">
                                <span x-text="contact.value"></span>
                            </template>
                        </td>
                        <td class="px-6 py-4" x-text="contact.main == 1 ? 'Principal' : ''"></td>
                        <td class="px-6 py-4">

                            <a :href="`/contacts/${contact.id}/edit`"
                                class="text-blue-600 hover:text-blue-800 font-medium">
                                Editar
                            </a>

                            <button @click="removeContact(contact.id, index)"
                                class="text-red-600 hover:text-red-800 font-medium">
                                Remover
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </template>


</div>

<!-- Script do componente Alpine -->
<script>
    function personContactsComponent() {
        return {

            contacts: [],
            editMode: false,
            contactToEdit: null,

            initContacts(data) {
                this.contacts = data || [];
            },

            async submitForm() {

                Swal.fire({
                    icon: 'info',
                    title: 'Enviando informações!',
                    timer: 2000,
                    showConfirmButton: false
                });

                const formEl = this.$refs.form;
                const formData = new FormData(formEl);

                try {
                    const res = await fetch('{{ route('contacts.store') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    if (!res.ok) {
                        const text = await res.text();
                        console.error('Resposta não OK:', text);
                        throw new Error('Erro ao salvar contato');
                    }

                    const newContact = await res.json();

                    // Força Alpine a atualizar o DOM
                    this.contacts = [...this.contacts, newContact];

                    window.dispatchEvent(new CustomEvent('close-modal'));

                    Swal.fire({
                        icon: 'success',
                        title: 'Contato salvo!',
                        timer: 2000,
                        showConfirmButton: false
                    });

                } catch (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Erro',
                        text: error.message
                    });
                }
            },

            async removeContact(id, index) {
                console.log('Deletar contato com ID:', id);
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
                    try {
                        const response = await fetch(`/contacts/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json'
                            },
                        });

                        if (response.ok) {
                            this.contacts.splice(index, 1);

                            await Swal.fire({
                                title: 'Deletado!',
                                text: 'Contato removido com sucesso.',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false,
                            });
                        } else {
                            const data = await response.json();
                            Swal.fire('Erro', data.message || 'Erro ao remover contato.', 'error');
                        }
                    } catch (error) {
                        console.error(error);
                        Swal.fire('Erro', 'Erro ao conectar com o servidor.', 'error');
                    }
                }

            },


        }
    }
</script>
