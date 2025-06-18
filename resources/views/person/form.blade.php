<div class="space-y-6">
    
    <div>
        <x-input-label for="name" :value="__('Name')"/>
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $person?->name)" autocomplete="name" placeholder="Name"/>
        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
    </div>
    <div>
        <x-input-label for="email" :value="__('Email')"/>
        <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $person?->email)" autocomplete="email" placeholder="Email"/>
        <x-input-error class="mt-2" :messages="$errors->get('email')"/>
    </div>
    <div>
        <x-input-label for="phone" :value="__('Phone')"/>
        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $person?->phone)" autocomplete="phone" placeholder="Phone"/>
        <x-input-error class="mt-2" :messages="$errors->get('phone')"/>
    </div>
    <div>
        <x-input-label for="birth_date" :value="__('Birth Date')"/>
        <x-text-input id="birth_date" name="birth_date" type="text" class="mt-1 block w-full" :value="old('birth_date', $person?->birth_date)" autocomplete="birth_date" placeholder="Birth Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('birth_date')"/>
    </div>
    <div>
        <x-input-label for="address_id" :value="__('Address Id')"/>
        <x-text-input id="address_id" name="address_id" type="text" class="mt-1 block w-full" :value="old('address_id', $person?->address_id)" autocomplete="address_id" placeholder="Address Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('address_id')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>