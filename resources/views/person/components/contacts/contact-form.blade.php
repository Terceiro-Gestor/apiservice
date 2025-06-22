<form wire:submit.prevent="save">
    <!-- campos aqui com wire:model.defer -->
    <div>
        <label for="type">Tipo</label>
        <select id="type" wire:model.defer="type" required>
            <option value="">Selecione</option>
            <option value="WhatsApp">WhatsApp</option>
            <option value="Celular">Celular</option>
            <option value="Email">Email</option>
        </select>
        @error('type') <span class="text-red-600">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="value">Valor</label>
        <input id="value" type="text" wire:model.defer="value" required />
        @error('value') <span class="text-red-600">{{ $message }}</span> @enderror
    </div>

    <div>
        <input type="checkbox" id="main" wire:model.defer="main" />
        <label for="main">Principal</label>
    </div>

    <div class="mt-4 flex justify-end space-x-2">
        <button type="button" wire:click="$set('showModal', false)" class="btn-cancel">Cancelar</button>
        <button type="submit" class="btn-save">Salvar</button>
    </div>
</form>
