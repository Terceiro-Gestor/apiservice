<div class="space-y-6">
    
    <div>
        <x-input-label for="people_id" :value="__('People Id')"/>
        <x-text-input id="people_id" name="people_id" type="text" class="mt-1 block w-full" :value="old('people_id', $referral?->people_id)" autocomplete="people_id" placeholder="People Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('people_id')"/>
    </div>
    <div>
        <x-input-label for="register_id" :value="__('Register Id')"/>
        <x-text-input id="register_id" name="register_id" type="text" class="mt-1 block w-full" :value="old('register_id', $referral?->register_id)" autocomplete="register_id" placeholder="Register Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('register_id')"/>
    </div>
    <div>
        <x-input-label for="referred_by_id" :value="__('Referred By Id')"/>
        <x-text-input id="referred_by_id" name="referred_by_id" type="text" class="mt-1 block w-full" :value="old('referred_by_id', $referral?->referred_by_id)" autocomplete="referred_by_id" placeholder="Referred By Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('referred_by_id')"/>
    </div>
    <div>
        <x-input-label for="service_id" :value="__('Service Id')"/>
        <x-text-input id="service_id" name="service_id" type="text" class="mt-1 block w-full" :value="old('service_id', $referral?->service_id)" autocomplete="service_id" placeholder="Service Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('service_id')"/>
    </div>
    <div>
        <x-input-label for="date" :value="__('Date')"/>
        <x-text-input id="date" name="date" type="text" class="mt-1 block w-full" :value="old('date', $referral?->date)" autocomplete="date" placeholder="Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('date')"/>
    </div>
    <div>
        <x-input-label for="status" :value="__('Status')"/>
        <x-text-input id="status" name="status" type="text" class="mt-1 block w-full" :value="old('status', $referral?->status)" autocomplete="status" placeholder="Status"/>
        <x-input-error class="mt-2" :messages="$errors->get('status')"/>
    </div>
    <div>
        <x-input-label for="notes" :value="__('Notes')"/>
        <x-text-input id="notes" name="notes" type="text" class="mt-1 block w-full" :value="old('notes', $referral?->notes)" autocomplete="notes" placeholder="Notes"/>
        <x-input-error class="mt-2" :messages="$errors->get('notes')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>