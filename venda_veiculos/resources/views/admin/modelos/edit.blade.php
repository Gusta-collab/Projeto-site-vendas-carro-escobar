<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight"></h2>
    </x-slot>

    <div class="py-12 bg-[#0a0a0a] min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-[#111] border border-gray-800 shadow-xl sm:rounded-xl overflow-hidden">
                <div class="p-6 text-gray-100">

                    <form method="POST" action="{{ route('admin.modelos.update', $modelo->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <label for="marca_id" class="block text-sm font-medium text-gray-300">
                                Marca
                            </label>

                            <select name="marca_id" id="marca_id"
                                class="mt-2 block w-full rounded-lg bg-gray-800 border border-gray-700 text-gray-100 shadow-md focus:border-gray-500 focus:ring-gray-500 transition-all duration-200"
                                required>
                                <option value="">Selecione uma marca</option>

                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->id }}" 
                                        {{ $modelo->marca_id == $marca->id ? 'selected' : '' }}>
                                        {{ $marca->nome }}
                                    </option>
                                @endforeach
                            </select>

                            @error('marca_id')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="nome" class="block text-sm font-medium text-gray-300">
                                Nome do Modelo
                            </label>

                            <input type="text" name="nome" id="nome"
                                   class="mt-2 block w-full rounded-lg bg-gray-800 border border-gray-700 text-gray-100 shadow-md focus:border-gray-500 focus:ring-gray-500 transition-all duration-200"
                                   required
                                   value="{{ old('nome', $modelo->nome) }}">

                            @error('nome')
                                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-8 flex items-center justify-end gap-x-6">
                            <a href="{{ route('admin.modelos.index') }}"
                               class="text-sm font-semibold text-gray-300 hover:text-gray-100 transition-all duration-200">
                                Cancelar
                            </a>

                            <button type="submit"
                                class="rounded-lg bg-gray-700 px-4 py-2 text-sm font-semibold text-white shadow-md hover:bg-gray-600 transition-all duration-200">
                                Salvar Alterações
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>
