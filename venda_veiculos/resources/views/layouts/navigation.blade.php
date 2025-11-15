<nav x-data="{ open: false }" class="bg-[#0a0a0a] border-b border-gray-800 text-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-2"> <!-- espaçamento entre links -->
                <div class="shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-200" />
                    </a>
                </div>

                <x-nav-link :href="route('admin.veiculos.index')" :active="request()->routeIs('admin.veiculos.*')" 
                    class="text-gray-100 hover:text-white px-3 py-2 rounded-md transition">
                    {{ __('Veículos') }}
                </x-nav-link>

                <x-nav-link :href="route('admin.modelos.index')" :active="request()->routeIs('admin.modelos.*')" 
                    class="text-gray-100 hover:text-white px-3 py-2 rounded-md transition">
                    {{ __('Modelos') }}
                </x-nav-link>

                <x-nav-link :href="route('admin.marcas.index')" :active="request()->routeIs('admin.marcas.*')" 
                    class="text-gray-100 hover:text-white px-3 py-2 rounded-md transition">
                    {{ __('Marcas') }}
                </x-nav-link>

                <x-nav-link :href="route('admin.cores.index')" :active="request()->routeIs('admin.cores.*')" 
                    class="text-gray-100 hover:text-white px-3 py-2 rounded-md transition">
                    {{ __('Cores') }}
                </x-nav-link>

                <a href="{{ route('home') }}" target="_blank" 
                    class="inline-flex items-center px-3 py-2 text-gray-100 rounded-md hover:text-white transition">
                    Ver Site Público
                </a>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-gray-100 hover:text-white rounded-md transition">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4 text-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-100 hover:text-white">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" class="text-gray-100 hover:text-white"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-100 hover:bg-gray-800 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#0a0a0a] border-t border-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-100 hover:text-white px-3 py-2 rounded-md transition">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-800">
            <div class="px-4">
                <div class="font-medium text-base text-gray-100">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-400">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-gray-100 hover:text-white px-3 py-2 rounded-md transition">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="text-gray-100 hover:text-white px-3 py-2 rounded-md transition"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
