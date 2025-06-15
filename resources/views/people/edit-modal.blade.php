<!-- Modal para edição -->
<div x-show="isEditModalOpen" style="background: rgba(0,0,0,0.5);"
    class="fixed inset-0 flex items-center justify-center z-50" x-transition>
    <div class="bg-white rounded shadow-lg p-6 w-full max-w-md" @click.away="closeEditModal()">
        <h3 class="text-xl font-bold mb-4">Editar Pessoa</h3>

        <form @submit.prevent="updatePerson()">
            <label class="block mb-2">
                Nome:
                <input type="text" x-model="editPerson.name" required
                    class="w-full border border-gray-300 rounded p-2" />
            </label>

            <label class="block mb-2">
                Email:
                <input type="email" x-model="editPerson.email" required
                    class="w-full border border-gray-300 rounded p-2" />
            </label>

            <label class="block mb-2">
                Telefone:
                <input type="text" x-model="editPerson.phone" class="w-full border border-gray-300 rounded p-2" />
            </label>

            <label class="block mb-4">
                Nascimento:
                <input type="date" x-model="editPerson.birth_date"
                    class="w-full border border-gray-300 rounded p-2" />
            </label>

            <div class="flex justify-end space-x-2">
                <button type="button" @click="closeEditModal()"
                    class="px-4 py-2 rounded border border-gray-400">Cancelar</button>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Salvar</button>
            </div>
        </form>
    </div>
</div>