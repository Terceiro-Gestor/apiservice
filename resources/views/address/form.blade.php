<form @submit.prevent="submitForm" x-ref="form">
    @csrf
    <div x-data="viacep()">
        <fieldset class="border border-gray-300 rounded p-6  mt-4 ">
            <legend class="text-sm font-semibold text-gray-700 px-2">CEP</legend>
            <div class="col-span-2">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    </div>
                    <input x-ref="cep" x-init="IMask($refs.cep, { mask: '00000-000' })" x-model="postal_code" maxlength="9" type="search"
                        id="postal_code" x-model="postal_code" name="postal_code" autocomplete="postal_code"
                        class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="CEP" required />
                    <button type="button" @click="buscar"
                        class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar
                        CEP</button>
                </div>
            </div>
        </fieldset>
        <fieldset class="border border-gray-300 rounded p-6  mt-4 grid grid-cols-2 gap-4">
            <legend class="text-sm font-semibold text-gray-700 px-2">Endereço</legend>
            <div class="">
                <x-input-label for="street" :value="__('Logradouro')" />
                <x-text-input x-model="street" id="street" name="street" type="text" class="mt-1 block w-full"
                    autocomplete="street" placeholder="Logradouro" />
                <x-input-error class="mt-2" :messages="$errors->get('street')" />
            </div>
            <div class="">
                <x-input-label for="district" :value="__('Bairro')" />
                <x-text-input x-model="district" id="district" name="district" type="text" class="mt-1 block w-full"
                    autocomplete="district" placeholder="Bairro" />
                <x-input-error class="mt-2" :messages="$errors->get('district')" />
            </div>
            <div class="">
                <x-input-label for="number" :value="__('Numero')" />
                <x-text-input x-model="number" id="number" name="number" type="text" class="mt-1 block w-full"
                    autocomplete="number" placeholder="Numero" />
                <x-input-error class="mt-2" :messages="$errors->get('number')" />
            </div>
            <div class="">
                <x-input-label for="complement" :value="__('Complemento')" />
                <x-text-input x-model="complement" id="complement" name="complement" type="text"
                    class="mt-1 block w-full" autocomplete="complement" placeholder="Complemento" />
                <x-input-error class="mt-2" :messages="$errors->get('complement')" />
            </div>

            <div class="">
                <x-input-label for="city" :value="__('Cidade')" />
                <x-text-input x-model="city" id="city" name="city" type="text" class="mt-1 block w-full"
                    autocomplete="city" placeholder="Cidade" />
                <x-input-error class="mt-2" :messages="$errors->get('city')" />
            </div>
            <div class="">
                <x-input-label for="state" :value="__('Estado')" />
                <x-text-input x-model="state" id="state" name="state" type="text" class="mt-1 block w-full"
                    autocomplete="state" placeholder="Estado" />
                <x-input-error class="mt-2" :messages="$errors->get('state')" />
            </div>
            <div class="">
                <x-input-label for="country" :value="__('Pais')" />
                <x-text-input x-model="country" id="country" name="country" type="text" class="mt-1 block w-full"
                    autocomplete="country" placeholder="Pais" />
                <x-input-error class="mt-2" :messages="$errors->get('country')" />
            </div>
        </fieldset>
    </div>

    <div class="mt-6 flex justify-end">
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Salvar</button>
    </div>
</form>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('viacep', () => ({
            postal_code: '',
            street: '',
            number: '',
            complement: '',
            district: '',
            city: '',
            state: '',
            country: '',
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
