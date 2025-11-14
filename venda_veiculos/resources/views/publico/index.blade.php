@extends('layouts.publico')

@section('content')

    <h1 class="text-3xl font-bold mb-6 text-gray-100">Carros Disponíveis</h1>

    <div class="bg-gray-800 p-8 md:p-12 rounded-xl shadow-2xl mb-10 border border-indigo-500/50 animate__animated animate__fadeInDown">
        <h2 class="text-4xl font-extrabold text-indigo-400 mb-2">
            Seu Próximo Veículo Está Aqui.
        </h2>
        <p class="text-gray-400 text-lg">
            Qualidade e procedência garantida. Encontre o carro perfeito em nossa seleção de usados e seminovos.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @forelse ($veiculos as $veiculo)
            
            <a href="{{ route('veiculo.show', $veiculo->id) }}" class="block transition-shadow duration-300 rounded-xl hover:shadow-xl hover:shadow-indigo-500/30">
                
                <div class="bg-gray-800 rounded-xl shadow-lg overflow-hidden h-full">
                    
                    <img src="{{ $veiculo->foto_1 }}" 
                         alt="Foto de {{ $veiculo->modelo->nome }}" 
                         class="w-full h-48 object-cover">

                    <div class="p-4">
                        
                        <h2 class="text-xl font-bold text-gray-100">
                            {{ $veiculo->modelo->marca->nome }} {{ $veiculo->modelo->nome }}
                        </h2>
                        <p class="text-sm text-gray-400 mb-2">
                            {{ $veiculo->ano }} | {{ $veiculo->cor->nome }} | {{ $veiculo->quilometragem }} km
                        </p>

                        <p class="text-2xl font-bold text-green-400 mb-2">
                            R$ {{ number_format($veiculo->valor, 2, ',', '.') }}
                        </p>

                        <p class="text-gray-500 text-sm mt-2">
                            {{ Str::limit($veiculo->detalhes, 80) }}
                        </p>

                    </div>
                </div>
            </a> 

        @empty
            <div class="col-span-3 text-center p-8 bg-gray-800 rounded-xl">
                <p class="text-gray-400">Nenhum veículo disponível para venda no momento.</p>
            </div>
        @endforelse

    </div>

@endsection