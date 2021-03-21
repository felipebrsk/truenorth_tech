@extends('layouts.nav-foot')

@section('content')
    <main class="my-8">
        <div class="container mx-auto px-6">
            @if (session()->has('success_message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Good!</strong>
                    <span class="block sm:inline">{{ session()->get('success_message') }}</span>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Ops!</strong>
                    @foreach ($errors->all() as $error)
                        <span class="block sm:inline">{{ $error }}</span>
                    @endforeach
                </div>
            @endif
            <div class="flex justify-between relative">
                <div>
                    <h3 class="text-gray-700 text-2xl font-medium">Lista de produtos</h3>
                    <span class="mt-3 text-sm text-gray-500">{{ $products->total() }}+ produtos</span>
                </div>
                <div>
                    <h3 class="text-gray-700 text-2xl font-medium">Produtos por página</h3>
                    <span class="mt-3 text-sm text-gray-500">
                        <form action="{{ route('shop.index') }}" method="GET">
                            <input class="w-full focus:outline-none border border-gray-900 rounded px-2 h-8 mt-2"
                                type="text" name="paginate" placeholder="Nº páginas" autocomplete="off" />
                        </form>
                    </span>
                </div>
            </div>
            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                @foreach ($products as $product)
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden transform hover:scale-105">
                            @if ($product->new === 1)
                                <img src="{{ asset('/images/lançamento_faixa.png') }}" alt="lançamento"
                                    class="absolute">
                            @endif
                            <div class="flex items-end justify-end w-full bg-cover h-72"
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
            <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between mt-8">
                <span class="text-xs xs:text-sm text-gray-900">
                    Mostrando {{ $products->count() }} de
                    {{ $products->total() }} resultados
                </span>
                <div class="inline-flex mt-2 xs:mt-0">
                    @if ($products->previousPageUrl() != null)
                        <a href="{{ $products->previousPageUrl() }}"
                            class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                            Anterior
                        </a>
                    @else

                    @endif
                    @if ($products->nextPageUrl() != null)
                        <a href="{{ $products->nextPageUrl() }}"
                            class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                            Próxima
                        </a>
                    @else

                    @endif
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection
