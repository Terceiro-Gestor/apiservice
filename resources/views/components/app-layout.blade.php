<!-- resources/views/components/app-layout.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>@yield('title', 'Alvorada')</title>
    @livewireStyles
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('scripts')

</head>

<body x-data="{ page: 'ecommerce', loaded: true, darkMode: false, stickyMenu: false, sidebarToggle: false, scrollTop: false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode') ?? 'false');
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" :class="{ 'dark bg-gray-900': darkMode }">

    <!-- ===== Preloader Start ===== -->
    <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
        class="fixed inset-0 z-50 flex items-center justify-center bg-white dark:bg-black">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-brand-500 border-t-transparent"></div>
    </div>
    <!-- ===== Preloader End ===== -->

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">

        <!-- ===== Sidebar Start ===== -->
        <x-sidebar />
        <!-- ===== Sidebar End ===== -->

        <!-- Header fixo no topo -->
        <header class="fixed top-0 left-0 right-0 z-40">
            <x-header />
        </header>

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-col flex-1 overflow-x-hidden overflow-y-auto">
            <!-- Small Device Overlay Start -->
            <x-overlay />
            <!-- Small Device Overlay End -->
            <!-- ===== Header Start ===== -->
            <x-header />
            <!-- ===== Header End ===== -->
            <!-- ===== Main Content Start ===== -->
            <main>
                <div class="p-4 mx-auto max-w-screen-2xl md:p-6">
                    {{ $slot }}
                </div>
            </main>
            <!-- ===== Main Content End ===== -->

        </div>

    </div>

    @livewireScripts

    <script>
        Livewire.on('sweet-success', data => {
            Swal.fire({
                icon: 'success',
                title: data.title,
                html: data.text,
            });
        });

        Livewire.on('sweet-error', data => {
            Swal.fire({
                icon: 'error',
                title: data.title,
                html: data.text,
            });
        });

        Livewire.on('sweet-confirm', data => {
            Swal.fire({
                title: data.title,
                html: data.text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Sim, quero deletar!"
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(data)
                    Livewire.dispatch("confirmDeleteContact", { id: data.id})
                }
            });
        });
    </script>



</body>

</html>
