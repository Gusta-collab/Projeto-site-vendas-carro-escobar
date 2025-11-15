<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Editar Veículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">

                    <form method="POST" action="{{ route('admin.veiculos.update', $veiculo->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                            <div>
                                <label for="marca_id" class="block text-sm font-medium text-gray-300">Marca</label>
                                <select name="marca_id" id="marca_id" class="mt-1 block w-full rounded-md border-gray-700 bg-neutral-800 text-gray-200 shadow-sm" required>
                                    <option value="">Selecione a Marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}" {{ $veiculo->modelo->marca_id == $marca->id ? 'selected' : '' }}>
                                            {{ $marca->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="modelo_id" class="block text-sm font-medium text-gray-300">Modelo</label>
                                <select name="modelo_id" id="modelo_id" class="mt-1 block w-full rounded-md border-gray-700 bg-neutral-800 text-gray-200 shadow-sm" required>
                                    <option value="">Selecione o Modelo</option>
                                    @foreach ($modelos as $modelo)
                                        <option value="{{ $modelo->id }}" {{ $veiculo->modelo_id == $modelo->id ? 'selected' : '' }}>
                                            {{ $modelo->nome }} ({{ $modelo->marca->nome }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                            <div>
                                <label for="cor_id" class="block text-sm font-medium text-gray-300">Cor</label>
                                <select name="cor_id" id="cor_id" class="mt-1 block w-full rounded-md border-gray-700 bg-neutral-800 text-gray-200 shadow-sm" required>
                                    <option value="">Selecione a Cor</option>
                                    @foreach ($cores as $cor)
                                        <option value="{{ $cor->id }}" {{ $veiculo->cor_id == $cor->id ? 'selected' : '' }}>
                                            {{ $cor->nome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="ano" class="block text-sm font-medium text-gray-300">Ano (Fabricação)</label>
                                <input type="number" name="ano" id="ano" class="mt-1 block w-full rounded-md border-gray-700 bg-neutral-800 text-gray-200 shadow-sm" required value="{{ old('ano', $veiculo->ano) }}">
                            </div>

                            <div>
                                <label for="quilometragem" class="block text-sm font-medium text-gray-300">Quilometragem (KM)</label>
                                <input type="number" name="quilometragem" id="quilometragem" class="mt-1 block w-full rounded-md border-gray-700 bg-neutral-800 text-gray-200 shadow-sm" required value="{{ old('quilometragem', $veiculo->quilometragem) }}">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="valor" class="block text-sm font-medium text-gray-300">Valor (R$)</label>
                            <input type="number" name="valor" id="valor" class="mt-1 block w-full rounded-md border-gray-700 bg-neutral-800 text-gray-200 shadow-sm" required step="0.01" value="{{ old('valor', $veiculo->valor) }}">
                        </div>

                        <div class="mb-4">
                            <label for="detalhes" class="block text-sm font-medium text-gray-300">Detalhes (Descrição)</label>
                            <textarea name="detalhes" id="detalhes" rows="4" class="mt-1 block w-full rounded-md border-gray-700 bg-neutral-800 text-gray-200 shadow-sm">{{ old('detalhes', $veiculo->detalhes) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
                            <div>
                                <label for="foto_1" class="block text-sm font-medium text-gray-300">Foto 1 (Principal - URL)</label>
                                <input type="text" name="foto_1" id="foto_1" class="mt-1 block w-full rounded-md border-gray-700 bg-neutral-800 text-gray-200 shadow-sm" value="{{ old('foto_1', $veiculo->foto_1) }}">
                            </div>
                            <div>
                                <label for="foto_2" class="block text-sm font-medium text-gray-300">Foto 2 (URL)</label>
                                <input type="text" name="foto_2" id="foto_2" class="mt-1 block w-full rounded-md border-gray-700 bg-neutral-800 text-gray-200 shadow-sm" value="{{ old('foto_2', $veiculo->foto_2) }}">
                            </div>
                            <div>
                                <label for="foto_3" class="block text-sm font-medium text-gray-300">Foto 3 (URL)</label>
                                <input type="text" name="foto_3" id="foto_3" class="mt-1 block w-full rounded-md border-gray-700 bg-neutral-800 text-gray-200 shadow-sm" value="{{ old('foto_3', $veiculo->foto_3) }}">
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{ route('admin.veiculos.index') }}" class="text-sm font-semibold leading-6 text-gray-300">
                                Cancelar
                            </a>
                            <button type="submit" 
                                    class="rounded-md bg-green-700 hover:bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm">
                                Salvar Alterações
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
