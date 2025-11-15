<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Editar Marca') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-[#0a0a0a] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-[#111] border border-gray-800 shadow-xl sm:rounded-xl overflow-hidden">
                <div class="p-6 text-gray-100">

                   <form method="POST" action="{{ route('admin.marcas.update', $marca) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-300">
                                Nome da Marca
                            </label>

                            <input type="text" name="nome" id="nome"
                                   class="mt-1 block w-full rounded-md border-gray-700 bg-black text-gray-100 shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
                                   required
                                   value="{{ old('nome', $marca->nome) }}">
                            @error('nome')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('admin.marcas.index') }}" class="text-sm font-semibold leading-6 text-gray-300">
                                Cancelar
                            </a>
                            <button type="submit"
                                    class="bg-gray-800 hover:bg-gray-700 transition-all duration-300 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:shadow-gray-600/30">
                                Salvar Alterações
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>