@props([
    'id' => 'default-modal',
    'title' => 'Modal',
    'width' => 'max-w-lg', // Tailwind classes como: max-w-sm, w-[400px], etc.
    'height' => 'h-[60vh]', // Pode usar h-[80vh], h-auto, etc.
])

<div x-data="modalController('{{ $id }}')" x-init="initListeners()">
    <div x-show="isModalOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black/75"
        style="display: none;">

        <div @click.outside="closeModal()"
            class="bg-white rounded-lg shadow-xl {{ $width }} {{ $height }} flex flex-col overflow-hidden">

            <div class="flex justify-between items-center px-4 py-2 border-b bg-gray-100">
                <h2 class="text-lg font-semibold">{{ $title }}</h2>
                <button @click="closeModal()"
                    class="text-gray-500 hover:text-red-600 text-2xl font-bold">&times;</button>
            </div>

            <div class="p-4 overflow-y-auto flex-1">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
<script>
    function modalController(id) {
        return {
            isModalOpen: false,

            initListeners() {
                window.addEventListener('open-modal', e => {
                    if (e.detail === id) {
                        this.openModal();
                    }
                });

                window.addEventListener('close-modal', () => {
                    this.closeModal();
                });
            },

            openModal() {
                this.isModalOpen = true;
            },

            closeModal() {
                this.isModalOpen = false;
            }
        }
    }
</script>
