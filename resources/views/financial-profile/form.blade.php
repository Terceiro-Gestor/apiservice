<div class="space-y-6">
    
    <div>
        <x-input-label for="people_id" :value="__('People Id')"/>
        <x-text-input id="people_id" name="people_id" type="text" class="mt-1 block w-full" :value="old('people_id', $financialProfile?->people_id)" autocomplete="people_id" placeholder="People Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('people_id')"/>
    </div>
    <div>
        <x-input-label for="category_financial_id" :value="__('Category Financial Id')"/>
        <x-text-input id="category_financial_id" name="category_financial_id" type="text" class="mt-1 block w-full" :value="old('category_financial_id', $financialProfile?->category_financial_id)" autocomplete="category_financial_id" placeholder="Category Financial Id"/>
        <x-input-error class="mt-2" :messages="$errors->get('category_financial_id')"/>
    </div>
    <div>
        <x-input-label for="amount" :value="__('Amount')"/>
        <x-text-input id="amount" name="amount" type="text" class="mt-1 block w-full" :value="old('amount', $financialProfile?->amount)" autocomplete="amount" placeholder="Amount"/>
        <x-input-error class="mt-2" :messages="$errors->get('amount')"/>
    </div>
    <div>
        <x-input-label for="date" :value="__('Date')"/>
        <x-text-input id="date" name="date" type="text" class="mt-1 block w-full" :value="old('date', $financialProfile?->date)" autocomplete="date" placeholder="Date"/>
        <x-input-error class="mt-2" :messages="$errors->get('date')"/>
    </div>
    <div>
        <x-input-label for="description" :value="__('Description')"/>
        <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" :value="old('description', $financialProfile?->description)" autocomplete="description" placeholder="Description"/>
        <x-input-error class="mt-2" :messages="$errors->get('description')"/>
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>Submit</x-primary-button>
    </div>
</div>