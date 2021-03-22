@extends('layouts.nav-foot')

@section('content')
    <main class="my-8">
        <div class="container mx-auto px-6">
            @if (session()->has('success_message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 mb-4"
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
            <div class="md:flex md:items-center mt-4">
                <div class="w-full h-64 md:w-1/2 lg:h-96 easyzoom">
                    <img class="h-auto w-full rounded-md object-cover max-w-lg mx-auto"
                        src="{{ asset('/images/' . $findProduct->image) }}" alt="{{$findProduct->product}}">
                </div>
                <div class="w-full max-w-lg mx-auto mt-32 md:ml-8 md:mt-0 md:w-1/2">
                    <h3 class="text-gray-700 uppercase text-lg">{{ $findProduct->product }}</h3>
                    <span class="text-gray-500 mt-3">R${{ $findProduct->price }}</span>
                    <hr class="my-3">
                    <div class="flex items-center mt-6">
                        <button
                            class="px-8 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-500 focus:outline-none focus:bg-indigo-500">Comprar
                            agora</button>
                        <form action="{{ route('cart.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $findProduct->id }}">
                            <input type="hidden" name="product" value="{{ $findProduct->product }}">
                            <input type="hidden" name="price" value="{{ $findProduct->price }}">
                            <button class="mx-2 text-gray-600 border rounded-md p-2 hover:bg-gray-200 focus:outline-none">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="mt-4">
                        <span class="flex font-bold text-gray-900">Descrição</span>
                        <p class="text-gray-400">- {{$findProduct->description}}</p>
                    </div>
                </div>
            </div>
            <div class="mt-52">
                <h3 class="text-gray-600 text-2xl font-medium">Você também pode gostar...</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    @foreach ($similarProducts as $product)
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <div
                                class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden transform hover:scale-105">
                                @if ($product->new === 1)
                                <img src="{{ asset('/images/lançamento_faixa.png') }}" alt="lançamento"
                                    class="absolute">
                            @endif
                                <div class="flex items-end justify-end w-full bg-cover h-56"
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
