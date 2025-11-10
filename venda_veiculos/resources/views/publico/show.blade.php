@extends('layouts.publico')

@section('content')
    <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-4xl mx-auto">
        
        {{-- SEÇÃO DAS FOTOS --}}
        <div>
            {{-- Foto Principal (foto_1) --}}
            <img src="{{ $veiculo->foto_1 }}" alt="Foto principal de {{ $veiculo->modelo->nome }}" class="w-full h-96 object-cover">

            {{-- Fotos Adicionais (foto_2 e foto_3) --}}
            <div class="grid grid-cols-2 gap-2 p-4">
                <img src="{{ $veiculo->foto_2 }}" alt="Foto 2" class="w-full h-48 object-cover rounded-lg">
                <img src="{{ $veiculo->foto_3 }}" alt="Foto 3" class="w-full h-48 object-cover rounded-lg">
            </div>
        </div>

        {{-- SEÇÃO DE INFORMAÇÕES --}}
        <div class="p-6">
            {{-- Título --}}
            <h1 class="text-3xl font-bold mb-2">
                {{ $veiculo->modelo->marca->nome }} {{ $veiculo->modelo->nome }}
            </h1>
            
            {{-- Preço --}}
            <p class="text-4xl font-bold text-blue-600 mb-6">
                R$ {{ number_format($veiculo->valor, 2, ',', '.') }}
            </p>

            {{-- Tabela de Detalhes (Ano, KM, Cor) --}}
            <div class="grid grid-cols-3 gap-4 mb-6 text-center">
                <div>
                    <span class="block text-sm text-gray-500">Ano</span>
                    <span class="text-lg font-semibold">{{ $veiculo->ano }}</span>
                </div>
                <div>
                    <span class="block text-sm text-gray-500">Quilometragem</span>
                    <span class="text-lg font-semibold">{{ $veiculo->quilometragem }} km</span>
                </div>
                <div>
                    <span class="block text-sm text-gray-500">Cor</span>
                    <span class="text-lg font-semibold">{{ $veiculo->cor->nome }}</span>
                </div>
            </div>

            {{-- Descrição (Campo "detalhes") --}}
            <div>
                <h3 class="text-xl font-semibold mb-2">Descrição</h3>
                <p class="text-gray-700 leading-relaxed">
                    {{ $veiculo->detalhes }}
                </p>
            </div>

            {{-- Link para Voltar --}}
            <div class="mt-8 text-center">
                <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
                    &larr; Voltar para a listagem
                </a>
            </div>
        </div>
    </div>
@endsection