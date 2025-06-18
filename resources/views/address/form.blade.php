<div x-show="step === 2" class='md-4'>
    <div class="space-y-6 my-6">
        <div class="flex justify-between mt-4">
            <button type="button" @click="step = 1" class="px-4 py-2 bg-gray-300 rounded">Voltar</button>
            <button type="button" @click="step = 3" class="px-4 py-2 bg-indigo-600 text-white rounded">Próximo</button>
        </div>
        <div>
            <x-input-label for="street" :value="__('Street')" />
            <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" :value="old('street', $address?->street)"
                autocomplete="street" placeholder="Street" />
            <x-input-error class="mt-2" :messages="$errors->get('street')" />
        </div>
        <div>
            <x-input-label for="number" :value="__('Number')" />
            <x-text-input id="number" name="number" type="text" class="mt-1 block w-full" :value="old('number', $address?->number)"
                autocomplete="number" placeholder="Number" />
            <x-input-error class="mt-2" :messages="$errors->get('number')" />
        </div>
        <div>
            <x-input-label for="complement" :value="__('Complement')" />
            <x-text-input id="complement" name="complement" type="text" class="mt-1 block w-full" :value="old('complement', $address?->complement)"
                autocomplete="complement" placeholder="Complement" />
            <x-input-error class="mt-2" :messages="$errors->get('complement')" />
        </div>
        <div>
            <x-input-label for="district" :value="__('District')" />
            <x-text-input id="district" name="district" type="text" class="mt-1 block w-full" :value="old('district', $address?->district)"
                autocomplete="district" placeholder="District" />
            <x-input-error class="mt-2" :messages="$errors->get('district')" />
        </div>
        <div>
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $address?->city)"
                autocomplete="city" placeholder="City" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>
        <div>
            <x-input-label for="state" :value="__('State')" />
            <x-text-input id="state" name="state" type="text" class="mt-1 block w-full" :value="old('state', $address?->state)"
                autocomplete="state" placeholder="State" />
            <x-input-error class="mt-2" :messages="$errors->get('state')" />
        </div>
        <div>
            <x-input-label for="country" :value="__('Country')" />
            <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country', $address?->country)"
                autocomplete="country" placeholder="Country" />
            <x-input-error class="mt-2" :messages="$errors->get('country')" />
        </div>
        <div>
            <x-input-label for="postal_code" :value="__('Postal Code')" />
            <x-text-input id="postal_code" name="postal_code" type="text" class="mt-1 block w-full"
                :value="old('postal_code', $address?->postal_code)" autocomplete="postal_code" placeholder="Postal Code" />
            <x-input-error class="mt-2" :messages="$errors->get('postal_code')" />
        </div>
    </div>
</div>
