function selectCountryStateCity() {
            return {
                countries: [],
                statesAll: [],
                citiesAll: [],
                states: [],
                cities: [],
                selectedCountry: @js(old('country', $form['country'] ?? '')),
                selectedState: @js(old('state', $form['state'] ?? '')),
                selectedCity: @js(old('city', $form['city'] ?? '')),

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
                    console.log(this.states.length);
                    if (!this.states.includes(this.selectedState)) {
                        this.selectedState = '';
                    }
                },

                updateCities() {
                    const country = this.citiesAll.find(c => c.country === this.selectedCountry);
                    this.cities = country ? [...new Set(country.cities)] : [];
                    console.log(this.cities.length);
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