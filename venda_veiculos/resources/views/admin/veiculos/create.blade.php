<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('admin.veiculos.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            
                            <div>
                                <label for="marca_id" class="block text-sm font-medium text-gray-700">Marca</label>
                                <select name="marca_id" id="marca_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="">Selecione a Marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="modelo_id" class="block text-sm font-medium text-gray-700">Modelo</label>
                                <select name="modelo_id" id="modelo_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="">Selecione o Modelo</option>
                                    @foreach ($modelos as $modelo)
                                        <option value="{{ $modelo->id }}">{{ $modelo->nome }} ({{$modelo->marca->nome}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                            {{-- Dropdown Cores --}}
                            <div>
                                <label for="cor_id" class="block text-sm font-medium text-gray-700">Cor</label>
                                <select name="cor_id" id="cor_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                                    <option value="">Selecione a Cor</option>
                                    @foreach ($cores as $cor)
                                        <option value="{{ $cor->id }}">{{ $cor->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="ano" class="block text-sm font-medium text-gray-700">Ano (Fabricação)</label>
                                <input type="number" name="ano" id="ano" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required placeholder="Ex: 2020">
                            </div>

                            <div>
                                <label for="quilometragem" class="block text-sm font-medium text-gray-700">Quilometragem (KM)</label>
                                <input type="number" name="quilometragem" id="quilometragem" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required placeholder="Ex: 25000">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="valor" class="block text-sm font-medium text-gray-700">Valor (R$)</label>
                            <input type="number" name="valor" id="valor" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required placeholder="Ex: 50000.00" step="0.01">
                        </div>

                        <div class="mb-4">
                            <label for="detalhes" class="block text-sm font-medium text-gray-700">Detalhes (Descrição)</label>
                            <textarea name="detalhes" id="detalhes" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                            <div>
                                <label for="foto_1" class="block text-sm font-medium text-gray-700">Foto 1 (Principal - URL)</label>
                                <input type="text" name="foto_1" id="foto_1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Cole endereço de imagem aqui">
                            </div>
                            <div>
                                <label for="foto_2" class="block text-sm font-medium text-gray-700">Foto 2 (URL)</label>
                                <input type="text" name="foto_2" id="foto_2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Cole endereço de imagem aqui">
                            </div>
                            <div>
                                <label for="foto_3" class="block text-sm font-medium text-gray-700">Foto 3 (URL)</label>
                                <input type="text" name="foto_3" id="foto_3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" placeholder="Cole endereço de imagem aqui">
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('admin.veiculos.index') }}" class="text-sm font-semibold leading-6 text-gray-900">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Salvar Veículo
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>