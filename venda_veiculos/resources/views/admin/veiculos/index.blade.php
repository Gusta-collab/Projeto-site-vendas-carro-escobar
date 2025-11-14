<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if (session('sucesso'))
                        <div class="mb-4 rounded-lg bg-green-100 p-4 text-sm text-green-700" role="alert">
                            {{ session('sucesso') }}
                        </div>
                    @endif
                    @if (session('erro'))
                        <div class="mb-4 rounded-lg bg-red-100 p-4 text-sm text-red-700" role="alert">
                            {{ session('erro') }}
                        </div>
                    @endif

                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Lista de Veículos</h3>
                        
                        <a href="{{ route('admin.veiculos.create') }}" class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded">
                            + Adicionar Veículo
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modelo</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marca</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ano</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                
                                @forelse ($veiculos as $veiculo)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $veiculo->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $veiculo->modelo?->nome }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $veiculo->modelo?->marca?->nome }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $veiculo->ano }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            R$ {{ number_format($veiculo->valor, 2, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            
                                            <a href="{{ route('admin.veiculos.edit', $veiculo) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            
                                            <form method="POST" action="{{ route('admin.veiculos.destroy', $veiculo) }}" class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-900 ml-4"
                                                    onclick="return confirm('Tem certeza que deseja excluir este veículo? Esta ação não pode ser desfeita.')">
                                                Excluir
                                            </button>
                                        </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
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
    </div>
</x-app-layout>