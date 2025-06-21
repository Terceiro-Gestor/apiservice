<div class="space-y-6">
    
    <div>
        <x-input-label for="person_id" :value="__('Person Id')"/>
        <x-text-input id="person_id" name="person_id" type="text" class="mt-1 block w-full" :value="old('person_id', $peopleRelationship?->person_id)" autocomplete="person_id" placeholder="Person Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('person_id')"/>
    </div>
    <div>
        <x-input-label for="related_person_id" :value="__('Related Person Id')"/>
        <x-text-input id="related_person_id" name="related_person_id" type="text" class="mt-1 block w-full" :value="old('related_person_id', $peopleRelationship?->related_person_id)" autocomplete="related_person_id" placeholder="Related Person Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('related_person_id')"/>
    </div>
    <div>
        <x-input-label for="relationship" :value="__('Relationship')"/>
        <x-text-input id="relationship" name="relationship" type="text" class="mt-1 block w-full" :value="old('relationship', $peopleRelationship?->relationship)" autocomplete="relationship" placeholder="Relationship"/>
        <x-input-error class="mt-2" :messages="$errors->get('relationship')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>