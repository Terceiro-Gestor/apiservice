<div x-show="step === 1">
    <div class="space-y-6">
        <div class="flex justify-end mt-4">
            <button type="button" @click="step = 2" class="px-4 py-2 bg-indigo-600 text-white rounded">Próximo</button>
        </div>
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $person?->name)"
                autocomplete="name" placeholder="Name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $person?->email)"
                autocomplete="email" placeholder="Email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>
        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $person?->phone)"
                autocomplete="phone" placeholder="Phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <div>
            <x-input-label for="birth_date" :value="__('Birth Date')" />
            <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block w-full" :value="old('birth_date', $person?->birth_date)"
                autocomplete="birth_date" placeholder="Birth Date" />
            <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
        </div>
    </div>
</div>
