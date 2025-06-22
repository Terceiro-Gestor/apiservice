<div x-data="personAddressComponent()" x-init="$nextTick(() => initAddress(@js($person->address ?? null)))">

    <div class="mb-4">

        <button @click="$dispatch('open-modal', 'modal-address')" class="bg-indigo-600 text-white px-4 py-2 rounded">
            Novo Endereço
        </button>

        <x-modal-form id="modal-address" title="Formulário de Endereço" width="w-[70vw]" height="h-[70vh]">
            @include('address.form')
        </x-modal-form>
    </div>

    <!-- Tabela com dados do endereço -->
    <template x-if="address">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Rua</th>
                    <th scope="col" class="px-6 py-3">Número</th>
                    <th scope="col" class="px-6 py-3">Complemento</th>
                    <th scope="col" class="px-6 py-3">Cidade</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">CEP</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        x-text="address.street"></td>
                    <td class="px-6 py-4" x-text="address.number"></td>
                    <td class="px-6 py-4" x-text="address.complement"></td>
                    <td class="px-6 py-4" x-text="address.city"></td>
                    <td class="px-6 py-4" x-text="address.state"></td>
                    <td class="px-6 py-4" x-text="address.postal_code"></td>
                </tr>
            </tbody>
        </table>
    </template>

    <!-- Script do componente Alpine -->
    <script>
        function personAddressComponent() {
            return {
                address: null,
                initAddress(data) {
                    this.address = data;
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
                        const res = await fetch('{{ route('addresses.store') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: formData
                        });

                        if (!res.ok) throw new Error('Erro ao salvar endereço');
                        const address = await res.json();

                        const linkRes = await fetch(`/people/{{ $person->id }}/set-address`, {
                            method: 'PUT',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                address_id: address.id
                            })
                        });

                        if (!linkRes.ok) throw new Error('Erro ao vincular endereço à pessoa');

                        this.address = address;

                        Swal.fire({
                            icon: 'success',
                            title: 'Endereço salvo!',
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
                }
            }
        }
    </script>
</div>
