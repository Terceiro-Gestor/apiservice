<div class="space-y-6">
    
    <div>
        <x-input-label for="people_id" :value="__('People Id')"/>
        <x-text-input id="people_id" name="people_id" type="text" class="mt-1 block w-full" :value="old('people_id', $register?->people_id)" autocomplete="people_id" placeholder="People Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('people_id')"/>
    </div>
    <div>
        <x-input-label for="service_id" :value="__('Service Id')"/>
        <x-text-input id="service_id" name="service_id" type="text" class="mt-1 block w-full" :value="old('service_id', $register?->service_id)" autocomplete="service_id" placeholder="Service Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('service_id')"/>
    </div>
    <div>
        <x-input-label for="registers_number" :value="__('Registers Number')"/>
        <x-text-input id="registers_number" name="registers_number" type="text" class="mt-1 block w-full" :value="old('registers_number', $register?->registers_number)" autocomplete="registers_number" placeholder="Registers Number"/>
        <x-input-error class="mt-2" :messages="$errors->get('registers_number')"/>
    </div>
    <div>
        <x-input-label for="registers_date" :value="__('Registers Date')"/>
        <x-text-input id="registers_date" name="registers_date" type="text" class="mt-1 block w-full" :value="old('registers_date', $register?->registers_date)" autocomplete="registers_date" placeholder="Registers Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('registers_date')"/>
    </div>
    <div>
        <x-input-label for="expiration_date" :value="__('Expiration Date')"/>
        <x-text-input id="expiration_date" name="expiration_date" type="text" class="mt-1 block w-full" :value="old('expiration_date', $register?->expiration_date)" autocomplete="expiration_date" placeholder="Expiration Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('expiration_date')"/>
    </div>
    <div>
        <x-input-label for="expiration_reason_id" :value="__('Expiration Reason Id')"/>
        <x-text-input id="expiration_reason_id" name="expiration_reason_id" type="text" class="mt-1 block w-full" :value="old('expiration_reason_id', $register?->expiration_reason_id)" autocomplete="expiration_reason_id" placeholder="Expiration Reason Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('expiration_reason_id')"/>
    </div>
    <div>
        <x-input-label for="status" :value="__('Status')"/>
        <x-text-input id="status" name="status" type="text" class="mt-1 block w-full" :value="old('status', $register?->status)" autocomplete="status" placeholder="Status"/>
        <x-input-error class="mt-2" :messages="$errors->get('status')"/>
    </div>
    <div>
        <x-input-label for="notes" :value="__('Notes')"/>
        <x-text-input id="notes" name="notes" type="text" class="mt-1 block w-full" :value="old('notes', $register?->notes)" autocomplete="notes" placeholder="Notes"/>
        <x-input-error class="mt-2" :messages="$errors->get('notes')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>