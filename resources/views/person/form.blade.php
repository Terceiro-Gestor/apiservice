<div x-show="step === 1">
    <div class="grid grid-cols-2 grid-rows-4 gap-4 md-4">
        <div>
            <x-input-label for="photo" :value="__('Photo')" />
            <x-text-input id="photo" name="photo" type="file" class="mt-1 block w-full" :value="old('photo', $person?->photo)"
                autocomplete="photo" placeholder="Photo" />
            <x-input-error class="mt-2" :messages="$errors->get('photo')" />
        </div>
        <div>
            <x-input-label for="full_name" :value="__('Full Name')" />
            <x-text-input id="full_name" name="full_name" type="text" class="mt-1 block w-full" :value="old('full_name', $person?->full_name)"
                autocomplete="full_name" placeholder="Full Name" />
            <x-input-error class="mt-2" :messages="$errors->get('full_name')" />
        </div>
        <div>
            <x-input-label for="social_name" :value="__('Social Name')" />
            <x-text-input id="social_name" name="social_name" type="text" class="mt-1 block w-full" :value="old('social_name', $person?->social_name)"
                autocomplete="social_name" placeholder="Social Name" />
            <x-input-error class="mt-2" :messages="$errors->get('social_name')" />
        </div>
        <div>
            <x-input-label for="birth_date" :value="__('Birth Date')" />
            <x-text-input id="birth_date" name="birth_date" type="text" class="mt-1 block w-full" :value="old('birth_date', $person?->birth_date)"
                autocomplete="birth_date" placeholder="Birth Date" />
            <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
        </div>
        <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <x-text-input id="gender" name="gender" type="text" class="mt-1 block w-full" :value="old('gender', $person?->gender)"
                autocomplete="gender" placeholder="Gender" />
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>
        <div>
            <x-input-label for="ethnicity" :value="__('Ethnicity')" />
            <x-text-input id="ethnicity" name="ethnicity" type="text" class="mt-1 block w-full" :value="old('ethnicity', $person?->ethnicity)"
                autocomplete="ethnicity" placeholder="Ethnicity" />
            <x-input-error class="mt-2" :messages="$errors->get('ethnicity')" />
        </div>
        <div>
            <x-input-label for="nationality" :value="__('Nationality')" />
            <x-text-input id="nationality" name="nationality" type="text" class="mt-1 block w-full"
                :value="old('nationality', $person?->nationality)" autocomplete="nationality" placeholder="Nationality" />
            <x-input-error class="mt-2" :messages="$errors->get('nationality')" />
        </div>
        <div>
            <x-input-label for="place_of_birth" :value="__('Place Of Birth')" />
            <x-text-input id="place_of_birth" name="place_of_birth" type="text" class="mt-1 block w-full"
                :value="old('place_of_birth', $person?->place_of_birth)" autocomplete="place_of_birth" placeholder="Place Of Birth" />
            <x-input-error class="mt-2" :messages="$errors->get('place_of_birth')" />
        </div>
        <div>
            <x-input-label for="marital_status" :value="__('Marital Status')" />
            <x-text-input id="marital_status" name="marital_status" type="text" class="mt-1 block w-full"
                :value="old('marital_status', $person?->marital_status)" autocomplete="marital_status" placeholder="Marital Status" />
            <x-input-error class="mt-2" :messages="$errors->get('marital_status')" />
        </div>
        <div>
            <x-input-label for="nis" :value="__('Nis')" />
            <x-text-input id="nis" name="nis" type="text" class="mt-1 block w-full" :value="old('nis', $person?->nis)"
                autocomplete="nis" placeholder="Nis" />
            <x-input-error class="mt-2" :messages="$errors->get('nis')" />
        </div>
        <div>
            <x-input-label for="cpf" :value="__('Cpf')" />
            <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" :value="old('cpf', $person?->cpf)"
                autocomplete="cpf" placeholder="Cpf" />
            <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
        </div>
        <div>
            <x-input-label for="rg" :value="__('Rg')" />
            <x-text-input id="rg" name="rg" type="text" class="mt-1 block w-full" :value="old('rg', $person?->rg)"
                autocomplete="rg" placeholder="Rg" />
            <x-input-error class="mt-2" :messages="$errors->get('rg')" />
        </div>
        <div>
            <x-input-label for="address_id" :value="__('Address Id')" />
            <x-text-input id="address_id" name="address_id" type="text" class="mt-1 block w-full"
                :value="old('address_id', $person?->address_id)" autocomplete="address_id" placeholder="Address Id" />
            <x-input-error class="mt-2" :messages="$errors->get('address_id')" />
        </div>
    </div>
    <div class="flex justify-end mt-4">
        <button type="button" @click="step = 2" class="px-4 py-2 bg-indigo-600 text-white rounded">Próximo</button>
    </div>
</div>
