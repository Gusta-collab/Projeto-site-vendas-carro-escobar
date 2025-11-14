<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Venda de Veículos</title>

    <!-- importação de -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- carregamento da animação -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-900 text-gray-100">

    <nav class="bg-gray-800 shadow-lg p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="font-bold text-xl text-indigo-400">
                LogoVeículos
            </a>
            
            <div class="flex items-center space-x-4">
                @auth
                    <a href="{{ route('admin.veiculos.index') }}" class="text-sm font-semibold hover:text-white transition duration-150 ease-in-out">
                        Área Admin
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm font-semibold text-red-400 hover:text-red-300">
                            Sair
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold hover:text-white transition duration-150 ease-in-out">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="text-sm font-semibold text-indigo-400 hover:text-indigo-300 transition duration-150 ease-in-out">
                        Registrar
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-4 mt-4">
        @yield('content')
    </main>

</body>
</html>