<div class="space-y-6">
    
    <div>
        <x-input-label for="people_id" :value="__('People Id')"/>
        <x-text-input id="people_id" name="people_id" type="text" class="mt-1 block w-full" :value="old('people_id', $suspension?->people_id)" autocomplete="people_id" placeholder="People Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('people_id')"/>
    </div>
    <div>
        <x-input-label for="register_id" :value="__('Register Id')"/>
        <x-text-input id="register_id" name="register_id" type="text" class="mt-1 block w-full" :value="old('register_id', $suspension?->register_id)" autocomplete="register_id" placeholder="Register Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('register_id')"/>
    </div>
    <div>
        <x-input-label for="start_date" :value="__('Start Date')"/>
        <x-text-input id="start_date" name="start_date" type="text" class="mt-1 block w-full" :value="old('start_date', $suspension?->start_date)" autocomplete="start_date" placeholder="Start Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('start_date')"/>
    </div>
    <div>
        <x-input-label for="end_date" :value="__('End Date')"/>
        <x-text-input id="end_date" name="end_date" type="text" class="mt-1 block w-full" :value="old('end_date', $suspension?->end_date)" autocomplete="end_date" placeholder="End Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('end_date')"/>
    </div>
    <div>
        <x-input-label for="reason" :value="__('Reason')"/>
        <x-text-input id="reason" name="reason" type="text" class="mt-1 block w-full" :value="old('reason', $suspension?->reason)" autocomplete="reason" placeholder="Reason"/>
        <x-input-error class="mt-2" :messages="$errors->get('reason')"/>
    </div>
    <div>
        <x-input-label for="status" :value="__('Status')"/>
        <x-text-input id="status" name="status" type="text" class="mt-1 block w-full" :value="old('status', $suspension?->status)" autocomplete="status" placeholder="Status"/>
        <x-input-error class="mt-2" :messages="$errors->get('status')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>