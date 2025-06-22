<div class="" x-data>
    <!-- Foto -->
    <fieldset class="border border-gray-300 rounded p-6 mt-4 grid grid-cols-2" x-data="photoView()">
        <legend class="text-sm font-semibold text-gray-700 px-2">Foto</legend>
        <div>
            <div class="flex items-center gap-4">
                <label for="photo"
                    class="cursor-pointer px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    Selecionar Foto
                </label>
                <span x-text="document.getElementById('photo')?.files[0]?.name || 'Nenhum arquivo selecionado'"></span>
            </div>
            <input id="photo" name="photo" type="file" class="hidden" accept="image/*" @change="previewPhoto" />
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>
        <div id="foto" class="flex items-center">
            <template x-if="photoUrl">
                <img :src="photoUrl" alt="Prévia da foto" class="h-24 w-24 rounded object-cover border" />
            </template>
        </div>
    </fieldset>

    <!-- Dados Pessoais -->
    <fieldset class="border border-gray-300 rounded p-6 col-span-2 mt-4 grid grid-cols-2 gap-4">
        <legend class="text-sm font-semibold text-gray-700 px-2">Dados Pessoais</legend>
        <div class="col-span-2">
            <x-input-label for="full_name" :value="__('Nome Completo')" />
            <x-text-input id="full_name" name="full_name" type="text" class="mt-1 block w-full" :value="old('full_name', $person?->full_name)"
                autocomplete="full_name" placeholder="Nome Completo" />
            <x-input-error class="mt-2" :messages="$errors->get('full_name')" />
        </div>
        <div>
            <x-input-label for="social_name" :value="__('Nome Social')" />
            <x-text-input id="social_name" name="social_name" type="text" class="mt-1 block w-full" :value="old('social_name', $person?->social_name)"
                autocomplete="social_name" placeholder="Nome Social" />
            <x-input-error class="mt-2" :messages="$errors->get('social_name')" />
        </div>
        <div>
            <x-input-label for="birth_date" :value="__('Data de Nascimento')" />
            <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block w-full" :value="old('birth_date', $person?->birth_date)"
                autocomplete="birth_date" placeholder="Data de Nascimento" />
            <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
        </div>
        <div>
            <x-input-label for="gender" :value="__('Gênero')" />
            <select id="gender" name="gender"
                class="block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                autocomplete="gender">
                <option value="">Selecione o gênero</option>
                <option value="Masculino" {{ old('gender', $person?->gender) == 'Masculino' ? 'selected' : '' }}>
                    Masculino
                </option>
                <option value="Feminino" {{ old('gender', $person?->gender) == 'Feminino' ? 'selected' : '' }}>Feminino
                </option>
                <option value="Outro" {{ old('gender', $person?->gender) == 'Outro' ? 'selected' : '' }}>Outro
                </option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>
        <div>
            <x-input-label for="ethnicity" :value="__('Etnia')" />
            <select id="ethnicity" name="ethnicity"
                class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                autocomplete="ethnicity">
                <option value="">Selecione a etnia</option>
                <option value="Branca" {{ old('ethnicity', $person?->ethnicity) == 'Branca' ? 'selected' : '' }}>
                    Branca
                </option>
                <option value="Preta" {{ old('ethnicity', $person?->ethnicity) == 'Preta' ? 'selected' : '' }}>
                    Preta
                </option>
                <option value="Parda" {{ old('ethnicity', $person?->ethnicity) == 'Parda' ? 'selected' : '' }}>
                    Parda
                </option>
                <option value="Amarela" {{ old('ethnicity', $person?->ethnicity) == 'Amarela' ? 'selected' : '' }}>
                    Amarela</option>
                <option value="Indígena" {{ old('ethnicity', $person?->ethnicity) == 'Indígena' ? 'selected' : '' }}>
                    Indígena</option>
                <option value="Outro" {{ old('ethnicity', $person?->ethnicity) == 'Outro' ? 'selected' : '' }}>
                    Outro
                </option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('ethnicity')" />
        </div>

        <div>
            <x-input-label for="marital_status" :value="__('Estado Civil')" />
            <select id="marital_status" name="marital_status"
                class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer"
                autocomplete="marital_status">
                <option value="">Selecione o estado civil</option>
                <option value="Solteiro(a)"
                    {{ old('marital_status', $person?->marital_status) == 'Solteiro(a)' ? 'selected' : '' }}>
                    Solteiro(a)</option>
                <option value="Casado(a)"
                    {{ old('marital_status', $person?->marital_status) == 'Casado(a)' ? 'selected' : '' }}>
                    Casado(a)</option>
                <option value="Divorciado(a)"
                    {{ old('marital_status', $person?->marital_status) == 'Divorciado(a)' ? 'selected' : '' }}>
                    Divorciado(a)</option>
                <option value="Viúvo(a)"
                    {{ old('marital_status', $person?->marital_status) == 'Viúvo(a)' ? 'selected' : '' }}>Viúvo(a)
                </option>
                <option value="Separado(a)"
                    {{ old('marital_status', $person?->marital_status) == 'Separado(a)' ? 'selected' : '' }}>
                    Separado(a)</option>
                <option value="Outro"
                    {{ old('marital_status', $person?->marital_status) == 'Outro' ? 'selected' : '' }}>Outro
                </option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('marital_status')" />
        </div>
    </fieldset>

    <!-- Documentação Pessoal -->
    <fieldset class="border border-gray-300 rounded p-6 col-span-2 mt-4">
        <legend class="text-sm font-semibold text-gray-700 px-2">Documentação Pessoal</legend>
        <div>
            <x-input-label for="nis" :value="__('NIS')" />
            <x-text-input id="nis" name="nis" type="text" class="mt-1 block w-full" :value="old('nis', $person?->nis)"
                autocomplete="nis" placeholder="NIS" />
            <x-input-error class="mt-2" :messages="$errors->get('nis')" />
        </div>
        <div>
            <x-input-label for="cpf" :value="__('CPF')" />
            <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" x-ref="cpf"
                x-init="IMask($refs.cpf, { mask: '000.000.000-00' })" maxlength="14" :value="old('cpf', $person?->cpf)" autocomplete="cpf" placeholder="CPF" />
            <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
        </div>
        <div>
            <x-input-label for="rg" :value="__('RG')" />
            <x-text-input x-ref="rg" x-init="IMask($refs.rg, { mask: '00.000.000-00' })" maxlength="14" id="rg" name="rg"
                type="text" class="mt-1 block w-full" :value="old('rg', $person?->rg)" autocomplete="rg" placeholder="RG" />
            <x-input-error class="mt-2" :messages="$errors->get('rg')" />
        </div>
    </fieldset>

    <!-- Naturalidade -->
    <fieldset class="border border-gray-300 rounded p-6 col-span-2 mt-4">
        <legend class="text-sm font-semibold text-gray-700 px-2">Naturalidade</legend>
        <div class="grid grid-cols-2 gap-3" x-data="selectCountryStateCity()" x-init="init()">

            <!-- País -->
            <div class="mb-3">
                <x-input-label for="country" :value="__('País')" />
                <select id="country" name="country" x-model="selectedCountry"
                    x-html="renderOptions(countries, selectedCountry)"
                    class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                </select>
            </div>

            <!-- Estado -->
            <div class="mb-3">
                <x-input-label for="state" :value="__('Estado')" />
                <select id="state" name="state" x-model="selectedState"
                    x-html="renderOptions(states, selectedState)"
                    class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                </select>
            </div>

            <!-- Cidade -->
            <div class="mb-3">
                <x-input-label for="city" :value="__('Cidade')" />
                <select id="city" name="city" x-model="selectedCity"
                    x-html="renderOptions(cities, selectedCity)"
                    class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                </select>
            </div>

        </div>

    </fieldset>

</div>


<script>
    function selectCountryStateCity() {
        return {
            countries: [],
            statesAll: [],
            citiesAll: [],
            states: [],
            cities: [],
            selectedCountry: '{{ old('country', $person?->country ?? 'Brazil') }}',
            selectedState: '{{ old('state', $person?->state ?? '') }}',
            selectedCity: '{{ old('city', $person?->city ?? '') }}',

            async init() {
                // 1. Carrega todos os países e estados
                const statesRes = await fetch('/data/states.json');
                const statesJson = await statesRes.json();
                this.statesAll = statesJson.data;
                this.countries = this.statesAll.map(c => c.name);

                // 2. Carrega todas as cidades (por país)
                const citiesRes = await fetch('/data/cities.json');
                const citiesJson = await citiesRes.json();
                this.citiesAll = citiesJson.data;

                // 3. Atualiza os selects iniciais
                this.updateStates();
                this.updateCities();

                // 4. Observadores
                this.$watch('selectedCountry', () => {
                    this.updateStates();
                    this.updateCities();
                });

                this.$watch('selectedState', () => {
                    // Nenhuma ação necessária, já que cidades são por país
                });
            },

            updateStates() {
                const country = this.statesAll.find(c => c.name === this.selectedCountry);
                this.states = country ? country.states.map(s => s.name) : [];
                if (!this.states.includes(this.selectedState)) {
                    this.selectedState = '';
                }
            },

            updateCities() {
                const country = this.citiesAll.find(c => c.country === this.selectedCountry);
                this.cities = country ? [...new Set(country.cities)] : [];
                if (!this.cities.includes(this.selectedCity)) {
                    this.selectedCity = '';
                }
            },

            renderOptions(items, selectedValue = '', placeholder = 'Selecione') {
                let html = `<option value="">${placeholder}</option>`;
                for (let item of items) {
                    const isSelected = item === selectedValue ? ' selected' : '';
                    html += `<option value="${item}"${isSelected}>${item}</option>`;
                }
                return html;
            }
        }
    }





    function photoView() {
        return {
            photoUrl: null,
            previewPhoto(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = e => this.photoUrl = e.target.result;
                    reader.readAsDataURL(file);
                } else {
                    this.photoUrl = null;
                }
            }
        }
    }
</script>
