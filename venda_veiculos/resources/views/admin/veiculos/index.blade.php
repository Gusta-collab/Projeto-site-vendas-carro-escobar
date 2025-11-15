<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Gerenciamento de Veículos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-neutral-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200">

                    @if (session('sucesso'))
                        <div class="mb-4 rounded-lg bg-green-900 p-4 text-sm text-green-300">
                            {{ session('sucesso') }}
                        </div>
                    @endif

                    @if (session('erro'))
                        <div class="mb-4 rounded-lg bg-red-900 p-4 text-sm text-red-300">
                            {{ session('erro') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-100">Lista de Veículos</h3>

                        <a href="{{ route('admin.veiculos.create') }}" 
                           class="bg-green-700 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            + Adicionar Veículo
                        </a>
                    </div>

                    <table class="min-w-full divide-y divide-neutral-700">
                        <thead class="bg-neutral-800">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Modelo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Marca</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Ano</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Valor</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-400 uppercase tracking-wider">Ações</th>
                            </tr>
                        </thead>

                        <tbody class="bg-neutral-900 divide-y divide-neutral-800">
                            @forelse ($veiculos as $veiculo)
                                <tr class="hover:bg-gray-900/40 transition-all duration-300">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        {{ $veiculo->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-100">
                                        {{ $veiculo->modelo?->nome }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        {{ $veiculo->modelo?->marca?->nome }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        {{ $veiculo->ano }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                                        R$ {{ number_format($veiculo->valor, 2, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-4">
                                        <a href="{{ route('admin.veiculos.edit', $veiculo) }}" 
                                           class="text-indigo-400 hover:text-indigo-300 transition-all duration-300">
                                            Editar
                                        </a>

                                        <form method="POST" action="{{ route('admin.veiculos.destroy', $veiculo) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-500 hover:text-red-400 ml-4 transition-all duration-300"
                                                    onclick="return confirm('Tem certeza?')">
                                                Excluir
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-400 text-center">
                                        Nenhum veículo cadastrado.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
