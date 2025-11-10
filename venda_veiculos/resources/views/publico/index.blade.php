{{-- Usamos o layout público que acabamos de criar --}}
@extends('layouts.publico')

{{-- Injetamos o conteúdo abaixo na seção 'content' do layout --}}
@section('content')

    <h1 class="text-3xl font-bold mb-6">Carros Disponíveis</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">


@forelse ($veiculos as $veiculo)
    
    {{-- Card do Veículo --}}
    <a href="{{ route('veiculo.show', $veiculo->id) }}" class="block hover:shadow-2xl transition-shadow duration-300">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            
            {{-- 
            Pega a primeira foto da coleção de fotos do veículo.
            O ->first() pega o primeiro item.
            O '?' (operador null-safe) evita erro se não houver fotos.
            --}}
            <img src="{{ $veiculo->foto_1}}" 
                alt="Foto de {{ $veiculo->modelo->nome }}" 
                class="w-full h-48 object-cover">

            <div class="p-4">
                

                <h2 class="text-xl font-bold">
                    {{ $veiculo->modelo->marca->nome }} {{ $veiculo->modelo->nome }}
                </h2>
                
                <p class="text-sm text-gray-600 mb-2">
                    {{ $veiculo->ano }} | {{ $veiculo->cor->nome }} | {{ $veiculo->quilometragem }} km
                </p>

                <p class="text-2xl font-bold text-blue-600 mb-4">
                    R$ {{ number_format($veiculo->valor, 2, ',', '.') }}
                </p>

                <p class="text-gray-700 text-sm">
                    {{ Str::limit($veiculo->detalhes, 100) }}
                </p>

            </div>
        </div>
    </a>

@empty
    //Mensagem caso o banco esteja vazio 
    <div class="col-span-3">
        <p class="text-center text-gray-500">Nenhum veículo encontrado no momento.</p>
    </div>
@endforelse

{{-- ... (código depois do loop) ... --}}

    </div>

@endsection