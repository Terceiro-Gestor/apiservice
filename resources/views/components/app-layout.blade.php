<!-- resources/views/components/app-layout.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <title>@yield('title', 'Sistema')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    @stack('scripts')

</head>

<body class="bg-gray-100 text-gray-900 font-sans">

    <!-- Menu superior -->
    <header class="bg-white shadow mb-6">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold">
                <a href="/" class="text-blue-600 hover:text-blue-800">Meu Sistema</a>
            </h1>
            <nav class="space-x-4">
                <a href="/people" class="text-gray-700 hover:text-blue-600">Pessoas</a>
                <a href="/page" class="text-gray-700 hover:text-blue-600">Página Teste</a>
                <!-- Adicione outros links aqui -->
            </nav>
        </div>
    </header>

    <!-- Conteúdo da página -->
    <main class="max-w-6xl mx-auto px-4">
        <div>
            {{ $header ?? '' }}
            {{ $slot }}
        </div>
    </main>

</body>

</html>
