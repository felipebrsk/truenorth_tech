@extends('layouts.main')

@section('content')
    @if (isset($ryzen))
        <main class="my-8">
            <div class="container mx-auto px-6">
                <div class="rounded-md overflow-hidden bg-cover bg-center h-80"
                    style="background-image: url('{{ asset('/images/' . '3931495.jpg') }}')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Linha Ryzen 3000</h2>
                            <p class="mt-2 text-gray-400">Se torne imbatível nos seus jogos com a linha 3000 Series da AMD.
                                Confira os novos processadores Ryzen 3000.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">Processadores Ryzen 3000 Series</h3>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        @foreach ($ryzen as $product)
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <div
                                    class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden transform hover:scale-105 h-full">
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
    @endif

    @if (isset($intel))
        <main class="my-8">
            <div class="container mx-auto px-6">
                <div class="rounded-md overflow-hidden bg-cover bg-center h-80"
                    style="background-image: url('{{ asset('/images/' . '812572173.jpg') }}')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Linha Intel 10th Geração</h2>
                            <p class="mt-2 text-gray-400">Confira a nova linha Inte Core 10th Generation, processadores
                                ultra rápidos para quem sonha em ter um PC ultra potente!</p>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">Processadores Intel Core 10th Gen Series</h3>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        @foreach ($intel as $product)
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <div
                                    class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden transform hover:scale-105 h-full">
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
    @endif

    @if (isset($rtx))
        <main class="my-8">
            <div class="container mx-auto px-6">
                <div class="rounded-md overflow-hidden bg-cover bg-center h-80"
                    style="background-image: url('{{ asset('/images/' . '6885146.png') }}')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">Linha RTX 20 Series</h2>
                            <p class="mt-2 text-gray-400">As placas de vídeo e notebooks com GeForce RTX™ Série 20 contam
                                com a tecnologia da arquitetura NVIDIA Turing™ com Ray Tracing em tempo real e aceleração de
                                AI.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">Linha RTX 20 Series</h3>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        @foreach ($rtx as $product)
                            <form action="{{ route('cart.store') }}" method="POST">
                                @csrf
                                <div
                                    class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden transform hover:scale-105">
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
    @endif

@endsection