@extends('layouts.publico')

@section('content')

    <!-- Título da página -->
    <h1 class="text-3xl font-bold mb-8 text-gray-100 tracking-tight">
        Carros Disponíveis
    </h1>

    <!-- Banner escuro elegante
    <div class="bg-[#111] p-10 md:p-14 rounded-2xl shadow-2xl mb-12 border border-gray-800 animate__animated animate__fadeInDown">
        <h3 class="text-4xl font-extrabold text-gray-100 mb-3 drop-shadow">
            Seu Próximo Veículo Está Aqui.
        </h3>
        <p class="text-gray-400 text-lg leading-relaxed max-w-3xl">
            Qualidade e procedência garantida. Explore nossa seleção completa de veículos usados e seminovos.
        </p>
    </div> -->

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse ($veiculos as $veiculo)

            <a href="{{ route('veiculo.show', $veiculo->id) }}"
               class="group block rounded-2xl transition-all duration-500 hover:scale-[1.04] hover:shadow-2xl hover:shadow-white/20"
               x-data="{
                   fotos: [
                       '{{ $veiculo->foto_1 }}',
                       '{{ $veiculo->foto_2 ?? $veiculo->foto_1 }}',
                       '{{ $veiculo->foto_3 ?? $veiculo->foto_1 }}'
                   ],
                   atual: 0,
                   interval: null,
                   start() {
                       this.stop();
                       this.interval = setInterval(() => {
                           this.atual = (this.atual + 1) % this.fotos.length;
                       }, 1500);
                   },
                   stop() {
                       clearInterval(this.interval);
                       this.atual = 0;
                   }
               }"
               @mouseenter="start()"
               @mouseleave="stop()">

                <div class="bg-[#111] rounded-2xl overflow-hidden border border-gray-800 shadow-lg">

                    <div class="relative h-52 overflow-hidden">

                        <img src="{{ $veiculo->foto_1 }}"
                             class="absolute inset-0 w-full h-full object-cover z-0">

                        <img :src="fotos[atual]"
                             class="absolute inset-0 w-full h-full object-cover
                                    transition-all duration-700 ease-out
                                    opacity-0 group-hover:opacity-100
                                    group-hover:scale-110
                                    z-10">
                    </div>

                    <div class="p-5">

                        <h2 class="text-xl font-semibold text-gray-100">
                            {{ $veiculo->modelo->marca->nome }} {{ $veiculo->modelo->nome }}
                        </h2>

                        <p class="text-sm text-gray-400 mb-2">
                            {{ $veiculo->ano }} • {{ $veiculo->cor->nome }} • {{ $veiculo->quilometragem }} km
                        </p>

                        <p class="text-2xl font-bold text-gray-100 mb-4">
                            R$ {{ number_format($veiculo->valor, 2, ',', '.') }}
                        </p>

                        <p class="text-gray-400 text-sm 
                               opacity-0 translate-y-2
                               group-hover:opacity-100 group-hover:translate-y-0
                               transition-all duration-500">
                            {{ Str::limit($veiculo->detalhes, 80) }}
                        </p>

                    </div>

                </div>
            </a>

        @empty

            <!-- Sem veículos -->
            <div class="col-span-3 text-center p-10 bg-[#111] rounded-2xl border border-gray-800 shadow-lg">
                <p class="text-gray-400 text-lg">Nenhum veículo disponível no momento.</p>
            </div>

        @endforelse

    </div>

@endsection
