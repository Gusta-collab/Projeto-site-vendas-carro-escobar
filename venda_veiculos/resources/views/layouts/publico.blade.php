{{-- Este é o template base para toda a área pública --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Venda de Veículos</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    {{-- Um menu simples (pode ser melhorado depois) --}}
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto">
            <a href="{{ route('home') }}" class="font-bold text-lg">LogoVeículos</a>
            {{-- Link para o Admin (só aparece se o usuário estiver logado) --}}
            @auth
                <a href="{{ route('admin.dashboard') }}" class="ml-4">Admin</a>
            @endauth
        </div>
    </nav>

    {{-- Onde o conteúdo de cada página será injetado --}}
    <main class="container mx-auto p-4">
        @yield('content')
    </main>

</body>
</html>