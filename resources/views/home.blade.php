@extends('layouts.main')

@section('content')
    <style>
        .text-white a {
            color: white;
        }

    </style>
    <main class="my-8">
        <div class="container mx-auto px-6">
            <div class="rounded-md overflow-hidden bg-cover bg-center h-80"
                style="background-image: url('{{ asset('/images/' . '6885146.png') }}')">
                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                    <div class="px-10 max-w-xl">
                        <h2 class="text-2xl text-white font-semibold">Linha GeForce RTX série 20</h2>
                        <p class="mt-2 text-gray-400">As placas de vídeo e notebooks com GeForce RTX™ Série 20 contam
                            com a tecnologia da arquitetura NVIDIA Turing™ com Ray Tracing em tempo real e aceleração de
                            AI.</p>
                        <button
                            class="flex items-center mt-4 px-3 py-2 bg-green-500 text-white text-sm uppercase font-medium rounded hover:bg-green-500 focus:outline-none focus:bg-green-500">
                            <a href="{{ route('linha.rtx') }}">Ver agora</a>
                            <svg class="h-5 w-5 mx-2 transform animate-bounce" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="md:flex mt-8 md:-mx-4">
                <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2"
                    style="background-image: url('{{ asset('/images/' . '812572173.jpg') }}')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Linha Intel Core 10th gen</h2>
                            <p class="mt-2 text-gray-400">Confira a nova linha Inte Core 10th Generation, processadores
                                ultra rápidos para quem sonha em ter um PC ultra potente!</p>
                            <button
                                class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                <a href="{{ route('linha.intel') }}" class="text-white">Ver agora</a>
                                <svg class="h-5 w-5 mx-2 transform animate-bounce" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2"
                    style="background-image: url('{{ asset('/images/' . '3931495.jpg') }}')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Linha Ryzen 3000</h2>
                            <p class="mt-2 text-gray-400">Se torne imbatível nos seus jogos com a linha 3000 Series da AMD.
                                Confira os novos processadores Ryzen 3000.</p>
                            <button
                                class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                <a class="text-white" href="{{ route('linha.3000') }}">Ver agora</a>
                                <svg class="h-5 w-5 mx-2 transform animate-bounce" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @if (session()->has('success_message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4"
                    role="alert">
                    <strong class="font-bold">Good!</strong>
                    <span class="block sm:inline">{{ session()->get('success_message') }}</span>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                    <strong class="font-bold">Ops!</strong>
                    @foreach ($errors->all() as $error)
                        <span class="block sm:inline">{{ $error }}</span>
                    @endforeach
                </div>
            @endif
            <div class="mt-16">
                <h3 class="text-gray-600 text-2xl font-medium">Mais vendidos</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @foreach ($produtos as $product)
                        @if ($product->best_seller == 1)
                            @if ($loop->index < 8)
                                <form action="{{ route('cart.store') }}" method="POST">
                                    @csrf
                                    <div
                                        class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden transform hover:scale-105">
                                        @if ($product->new === 1)
                                            <img src="{{ asset('/images/lançamento_faixa.png') }}" alt="lançamento"
                                                class="absolute">
                                        @endif
                                        <div class="flex items-end justify-end h-56 w-full bg-cover"
                                            style="background-image: url('{{ asset('/images/' . $product->image) }}')">
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="product" value="{{ $product->product }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">
                                            <button type="submit"
                                                class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path
                                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="px-5 py-3">
                                            <a href="{{ route('shop.show', $product->id) }}"
                                                class="text-gray-700 uppercase">{{ $product->product }}</a><br />
                                            <span class="text-gray-500 mt-2">R${{ $product->price }}</span>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="mt-16">
                <h3 class="text-gray-600 text-2xl font-medium">Maior rating</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @foreach ($randomProducts as $product)
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <div
                                class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden transform hover:scale-105">
                                @if ($product->new === 1)
                                    <img src="{{ asset('/images/lançamento_faixa.png') }}" alt="lançamento"
                                        class="absolute">
                                @endif
                                <div class="flex items-end justify-end h-56 w-full bg-cover"
                                    style="background-image: url('{{ asset('/images/' . $product->image) }}')">
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="product" value="{{ $product->product }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                    <button type="submit"
                                        class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="px-5 py-3">
                                    <a href="{{ route('shop.show', $product->id) }}"
                                        class="text-gray-700 uppercase">{{ $product->product }}</a><br />
                                    <span class="text-gray-500 mt-2">R${{ $product->price }}</span>
                                </div>
                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </main>

@endsection
