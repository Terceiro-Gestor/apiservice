<div x-show="step === 2" class='md-4'>
    <div class="space-y-6 my-6" x-data="viacep()">

        <div class="flex justify-between mt-4">
            <button type="button" @click="step = 1" class="px-4 py-2 bg-gray-300 rounded">Voltar</button>
            <button type="button" @click="step = 3" class="px-4 py-2 bg-indigo-600 text-white rounded">Próximo</button>
        </div>

        <div>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                </div>
                <input type="search" id="postal_code" x-model="postal_code" name="postal_code" 
                autocomplete="postal_code"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="CEP" required />
                <button type="button" @click="buscar"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar
                    CEP</button>
            </div>
        </div>
        <hr class="my-4 bg-gray-800" >
        <div>
            <x-input-label for="postal_code" :value="__('CEP')" />
            <x-text-input id="postal_code" x-model="postal_code" name="postal_code" type="text"
                class="mt-1 block w-full" autocomplete="postal_code" placeholder="CEP" />
            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
        </div>
        <div>
            <x-input-label for="street" :value="__('Logradouro')" />
            <x-text-input x-model="street" id="street" name="street" type="text" class="mt-1 block w-full"
                autocomplete="street" placeholder="Logradouro" />
            <x-input-error class="mt-2" :messages="$errors->get('street')" />
        </div>
        <div>
            <x-input-label for="number" :value="__('Numero')" />
            <x-text-input x-model="number" id="number" name="number" type="text" class="mt-1 block w-full"
                autocomplete="number" placeholder="Numero" />
            <x-input-error class="mt-2" :messages="$errors->get('number')" />
        </div>
        <div>
            <x-input-label for="complement" :value="__('Complemento')" />
            <x-text-input x-model="complement" id="complement" name="complement" type="text"
                class="mt-1 block w-full" autocomplete="complement" placeholder="Complemento" />
            <x-input-error class="mt-2" :messages="$errors->get('complement')" />
        </div>
        <div>
            <x-input-label for="district" :value="__('Bairro')" />
            <x-text-input x-model="district" id="district" name="district" type="text" class="mt-1 block w-full"
                autocomplete="district" placeholder="Bairro" />
            <x-input-error class="mt-2" :messages="$errors->get('district')" />
        </div>
        <div>
            <x-input-label for="city" :value="__('Cidade')" />
            <x-text-input x-model="city" id="city" name="city" type="text" class="mt-1 block w-full"
                autocomplete="city" placeholder="Cidade" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>
        <div>
            <x-input-label for="state" :value="__('Estado')" />
            <x-text-input x-model="state" id="state" name="state" type="text" class="mt-1 block w-full"
                autocomplete="state" placeholder="Estado" />
            <x-input-error class="mt-2" :messages="$errors->get('state')" />
        </div>
        <div>
            <x-input-label for="country" :value="__('Pais')" />
            <x-text-input x-model="country" id="country" name="country" type="text" class="mt-1 block w-full"
                autocomplete="country" placeholder="Pais" />
            <x-input-error class="mt-2" :messages="$errors->get('country')" />
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('viacep', () => ({
            postal_code: '{{ old('postal_code', $address?->postal_code) }}',
            street: '{{ old('street', $address?->street) }}',
            number: '{{ old('number', $address?->number) }}',
            complement: '{{ old('complement', $address?->complement) }}',
            district: '{{ old('district', $address?->district) }}',
            city: '{{ old('city', $address?->city) }}',
            state: '{{ old('state', $address?->state) }}',
            country: '{{ old('country', $address?->country) }}',
            async buscar() {
                if (this.postal_code.replace(/\D/g, '').length === 8) {

                    Swal.fire({
                        title: 'Buscando...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    const res = await fetch(
                        `https://viacep.com.br/ws/${this.postal_code}/json/`);
                    const data = await res.json();

                    if (!data.erro) {

                        Swal.fire({
                            icon: 'success',
                            title: 'CEP encontrado!',
                            timer: 2000,
                            showConfirmButton: false,
                        });

                        this.street = data.logradouro;
                        this.district = data.bairro;
                        this.city = data.localidade;
                        this.state = data.estado;
                        this.country = 'Brasil'; // Definindo o país como Brasil

                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro!',
                            text: 'Não foi possível encontrar o CEP.',
                            timer: 2000,
                            showConfirmButton: false,
                        });
                    }
                }
            }
        }))
    })
</script>
