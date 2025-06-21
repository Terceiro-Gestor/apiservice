<div class="space-y-6">
    
    <div>
        <x-input-label for="family_id" :value="__('Family Id')"/>
        <x-text-input id="family_id" name="family_id" type="text" class="mt-1 block w-full" :value="old('family_id', $familyPerson?->family_id)" autocomplete="family_id" placeholder="Family Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('family_id')"/>
    </div>
    <div>
        <x-input-label for="people_id" :value="__('People Id')"/>
        <x-text-input id="people_id" name="people_id" type="text" class="mt-1 block w-full" :value="old('people_id', $familyPerson?->people_id)" autocomplete="people_id" placeholder="People Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('people_id')"/>
    </div>
    <div>
        <x-input-label for="relationship" :value="__('Relationship')"/>
        <x-text-input id="relationship" name="relationship" type="text" class="mt-1 block w-full" :value="old('relationship', $familyPerson?->relationship)" autocomplete="relationship" placeholder="Relationship"/>
        <x-input-error class="mt-2" :messages="$errors->get('relationship')"/>
    </div>
    <div>
        <x-input-label for="composes_income" :value="__('Composes Income')"/>
        <x-text-input id="composes_income" name="composes_income" type="text" class="mt-1 block w-full" :value="old('composes_income', $familyPerson?->composes_income)" autocomplete="composes_income" placeholder="Composes Income"/>
        <x-input-error class="mt-2" :messages="$errors->get('composes_income')"/>
    </div>
    <div>
        <x-input-label for="lives_in_household" :value="__('Lives In Household')"/>
        <x-text-input id="lives_in_household" name="lives_in_household" type="text" class="mt-1 block w-full" :value="old('lives_in_household', $familyPerson?->lives_in_household)" autocomplete="lives_in_household" placeholder="Lives In Household"/>
        <x-input-error class="mt-2" :messages="$errors->get('lives_in_household')"/>
    </div>
    <div>
        <x-input-label for="is" :value="__('Is')"/>
        <x-text-input id="is" name="is" type="text" class="mt-1 block w-full" :value="old('is', $familyPerson?->is)" autocomplete="is" placeholder="Is"/>
        <x-input-error class="mt-2" :messages="$errors->get('is')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>