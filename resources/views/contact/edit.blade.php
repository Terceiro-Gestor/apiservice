<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">Editar Contato</h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
        <form method="POST" action="{{ route('contacts.update', $contact->id) }}" role="form"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="person_id" value="{{ $contact->person_id }}">
            <!-- Tipo -->
            <label class="block mb-2">Tipo</label>
            <select name="type" class="w-full border rounded mb-4" required>
                <option value="WhatsApp" @selected($contact->type == 'WhatsApp')>WhatsApp</option>
                <option value="Celular" @selected($contact->type == 'Celular')>Celular</option>
                <option value="Email" @selected($contact->type == 'Email')>Email</option>
            </select>

            <!-- Valor -->
            <label class="block mb-2">Valor</label>
            <input type="text" name="value" value="{{ $contact->value }}" class="w-full border rounded mb-4"
                required>

            <!-- Principal -->
            <label class="flex items-center space-x-2 mb-4">
                <input type="checkbox" name="main" value="1" @checked($contact->main)>
                <span>Principal</span>
            </label>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Atualizar</button>
        </form>
    </div>
</x-app-layout>
