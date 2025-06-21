<div class="space-y-6">
    
    <div>
        <x-input-label for="people_id" :value="__('People Id')"/>
        <x-text-input id="people_id" name="people_id" type="text" class="mt-1 block w-full" :value="old('people_id', $presence?->people_id)" autocomplete="people_id" placeholder="People Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('people_id')"/>
    </div>
    <div>
        <x-input-label for="register_id" :value="__('Register Id')"/>
        <x-text-input id="register_id" name="register_id" type="text" class="mt-1 block w-full" :value="old('register_id', $presence?->register_id)" autocomplete="register_id" placeholder="Register Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('register_id')"/>
    </div>
    <div>
        <x-input-label for="date" :value="__('Date')"/>
        <x-text-input id="date" name="date" type="text" class="mt-1 block w-full" :value="old('date', $presence?->date)" autocomplete="date" placeholder="Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('date')"/>
    </div>
    <div>
        <x-input-label for="type" :value="__('Type')"/>
        <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" :value="old('type', $presence?->type)" autocomplete="type" placeholder="Type"/>
        <x-input-error class="mt-2" :messages="$errors->get('type')"/>
    </div>
    <div>
        <x-input-label for="description" :value="__('Description')"/>
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $presence?->description)" autocomplete="description" placeholder="Description"/>
        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>