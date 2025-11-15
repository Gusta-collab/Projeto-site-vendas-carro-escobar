<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Venda de Veículos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-black text-gray-200">

    <nav class="bg-neutral-950 border-b border-neutral-800 shadow-xl p-4">
        <div class="container mx-auto flex justify-between items-center">

            <a href="{{ route('home') }}" class="font-bold text-xl text-white flex items-center">
                <img src="https://png.pngtree.com/element_our/png_detail/20181008/s-logo-template-isolated-on-black-background-png_130991.jpg"
                     alt=""
                     class="h-10 w-auto">
            </a>

            <div class="flex items-center space-x-6">

                @auth
                    <a href="{{ route('admin.veiculos.index') }}"
                       class="text-sm font-semibold text-gray-300 hover:text-gray-100 transition duration-150">
                        Área Admin
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-sm font-semibold text-red-400 hover:text-red-300 transition duration-150">
                            Sair
                        </button>
                    </form>

                @else
                    <a href="{{ route('login') }}"
                       class="text-sm font-semibold text-gray-300 hover:text-gray-100 transition duration-150">
                        Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="text-sm font-semibold text-gray-300 hover:text-gray-100 transition duration-150">
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
