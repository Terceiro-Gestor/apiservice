<div x-data="{ show: false }" x-on:open-modal.window="if ($event.detail.id === '{{ $id }}') show = true"
    x-on:close-modal.window="if ($event.detail.id === '{{ $id }}') show = false" x-show="show"
    class="fixed z-50 top-0 left-0 right-0 bottom-0 p-6 overflow-auto bg-black/50" x-cloak>

    <!-- Conteúdo do modal -->
    <div class=" top-16 left-24 {{ $class }} relative bg-white rounded shadow-lg mx-auto mt-10 p-6" @click.stop>
        <button @click="show = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 focus:outline-none"
            aria-label="Fechar">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 8.586L15.95 2.636a1 1 0 111.414 1.414L11.414 10l5.95 5.95a1 1 0 01-1.414 1.414L10 11.414l-5.95 5.95a1 1 0 01-1.414-1.414L8.586 10 2.636 4.05A1 1 0 014.05 2.636L10 8.586z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <h2 class="text-xl font-semibold mb-4">{{ $title }}</h2>
        
        <div>
            {{ $slot }}
        </div>

        @if ($footer)
            <div class="mt-4 border-t pt-4">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
