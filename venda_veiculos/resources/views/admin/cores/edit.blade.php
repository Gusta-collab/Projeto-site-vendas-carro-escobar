<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight"></h2>
    </x-slot>

    <div class="py-12 bg-black">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">

                    <form method="POST" action="{{ route('admin.cores.update', $cor) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="nome" class="block text-sm font-medium text-gray-300">Nome da Cor</label>
                            <input type="text" name="nome" id="nome"
                                   class="mt-1 block w-full rounded-md border-gray-700 bg-black text-gray-100 shadow-sm focus:border-gray-500 focus:ring-gray-500 sm:text-sm"
                                   required
                                   value="{{ old('nome', $cor->nome) }}">
                            @error('nome')
                                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('admin.cores.index') }}" class="text-sm font-semibold leading-6 text-gray-300">
                                Cancelar
                            </a>
                            <button type="submit"
                                    class="rounded-md bg-gray-800 px-3 py-2 text-sm font-semibold text-gray-100 shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                                Salvar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
