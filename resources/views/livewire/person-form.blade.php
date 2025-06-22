<form wire:submit.prevent="save" class="space-y-4">
    <div>
        <label class="block font-semibold mb-1">Nome</label>
        <input type="text" wire:model.defer="name" class="w-full border rounded px-3 py-2">
        @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
    </div>

    <!-- Outros campos -->

    <div class="flex justify-end space-x-2 mt-6">
        <button type="button" wire:click="$emit('closeModal')"
            class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
            Cancelar
        </button>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Salvar
        </button>
    </div>
</form>
