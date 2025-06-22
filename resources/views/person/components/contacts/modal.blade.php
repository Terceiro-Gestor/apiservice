@props([
    'id' => 'default-modal',
    'title' => 'Modal',
    'width' => 'max-w-xl',
    'height' => 'h-auto'
])

<div x-data="modalController()" x-init="
    window.addEventListener('open-modal', e => openModal(e.detail));
    window.addEventListener('close-modal', () => closeModal());
">
    <div x-show="isModalOpen" x-transition.opacity class="fixed inset-0 z-50 flex items-center justify-center bg-black/60" style="display: none;">
        <div @click.outside="closeModal()" :class="'bg-white rounded-lg shadow-lg w-full ' + '{{ $width }} {{ $height }}'" class="overflow-hidden">
            <div class="flex justify-between items-center px-4 py-2 border-b bg-gray-100">
                <h2 class="text-lg font-semibold">{{ $title }}</h2>
                <button @click="closeModal()" class="text-gray-500 hover:text-red-600 text-2xl font-bold">&times;</button>
            </div>
            <div class="p-4 overflow-y-auto">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

<script>
    function modalController() {
        return {
            isModalOpen: false,
            openModal(id) {
                if (id === '{{ $id }}') this.isModalOpen = true;
            },
            closeModal() {
                this.isModalOpen = false;
            }
        }
    }
</script>
