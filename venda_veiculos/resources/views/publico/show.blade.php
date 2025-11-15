@extends('layouts.publico')

@section('content')
<div class="bg-neutral-900 rounded-xl shadow-2xl overflow-hidden max-w-6xl mx-auto border border-neutral-700 animate__animated animate__fadeIn">
        
    <div class="p-8">
        <div class="mb-6 border-b border-neutral-700 pb-4">
            <h1 class="text-4xl font-extrabold text-gray-100 mb-1">
                {{ $veiculo->modelo->marca->nome }} {{ $veiculo->modelo->nome }}
            </h1>
            <p class="text-3xl font-bold text-gray-200">
                R$ {{ number_format($veiculo->valor, 2, ',', '.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-8">
            <div class="lg:col-span-2">
                <img src="{{ $veiculo->foto_1 }}" alt="Foto principal de {{ $veiculo->modelo->nome }}" class="w-full h-96 object-cover rounded-lg shadow-lg border border-neutral-700">
            </div>

            <div class="flex flex-col space-y-4">
                <img src="{{ $veiculo->foto_2 }}" alt="Foto 2" class="w-full h-48 object-cover rounded-lg shadow-md border border-neutral-700">
                <img src="{{ $veiculo->foto_3 }}" alt="Foto 3" class="w-full h-48 object-cover rounded-lg shadow-md border border-neutral-700">
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-1 bg-neutral-800 p-6 rounded-xl shadow-inner border border-neutral-700 animate__animated animate__fadeInUp animate__delay-1s">
                <h3 class="text-xl font-semibold text-gray-100 mb-4 border-b border-neutral-600 pb-2">
                    Especificações Rápidas
                </h3>
                <div class="space-y-3 text-gray-300">
                    <p><strong class="text-gray-100">Ano:</strong> {{ $veiculo->ano }}</p>
                    <p><strong class="text-gray-100">Cor:</strong> {{ $veiculo->cor->nome }}</p>
                    <p><strong class="text-gray-100">KM:</strong> {{ number_format($veiculo->quilometragem, 0, ',', '.') }} km</p>
                    <p><strong class="text-gray-100">Valor FIPE:</strong> (A negociar)</p>
                </div>
            </div>

            <div class="lg:col-span-2 animate__animated animate__fadeInUp animate__delay-2s">
                <h3 class="text-2xl font-semibold text-gray-100 mb-4">Detalhes do Veículo</h3>
                <p class="text-gray-300 leading-relaxed bg-neutral-800 p-4 rounded-lg shadow-inner border border-neutral-700">
                    {{ $veiculo->detalhes }}
                </p>

                <div class="mt-8 text-left">
                    <a href="{{ route('home') }}" class="text-gray-400 hover:text-white font-medium transition-colors duration-200">
                        &larr; Voltar para a listagem
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
