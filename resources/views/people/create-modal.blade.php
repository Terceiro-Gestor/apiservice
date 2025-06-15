<!-- Modal de Criação -->
<div x-show="showCreatePersonModal" style="background: rgba(0,0,0,0.5);"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded shadow-md w-full max-w-lg" @click.away="showCreatePersonModal = false">
        <h2 class="text-xl font-bold mb-4">Nova Pessoa</h2>

        <form @submit.prevent="createPerson">
            <div class="mb-3">
                <label class="block">Nome</label>
                <input type="text" x-model="newPerson.name" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label class="block">Email</label>
                <input type="email" x-model="newPerson.email" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-3">
                <label class="block">Telefone</label>
                <input type="text" x-model="newPerson.phone" class="w-full border p-2 rounded">
            </div>

            <div class="mb-3">
                <label class="block">Data de Nascimento</label>
                <input type="date" x-model="newPerson.birth_date" class="w-full border p-2 rounded">
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" @click="showCreatePersonModal = false"
                    class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">
                    Cancelar
                </button>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>
