<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @livewireStyles
    <title>TrueNorth Technology - @if (isset($findProduct))
            {{ $findProduct->product }} @endif
    </title>
</head>

<body>

    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white"
        @keydown.escape.window="cartOpen = false" @click.away="cartOpen = !cartOpen">
        <header>
            <div class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="hidden w-full text-gray-600 md:flex md:items-center">
                    </div>
                    <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                        <a href="{{ route('home') }}">TrueNorth</a>
                    </div>
                    <div class="flex items-center justify-end w-full">
                        @if (Auth::user())
                            <button @click="cartOpen = !cartOpen"
                                class="text-gray-600 focus:outline-none mx-4 sm:mx-0 relative flex">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>

                            </button>
                        @endif

                        <div class="flex sm:hidden">
                            <button @click="isOpen = !isOpen" type="button"
                                class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                                aria-label="toggle menu">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                    <path fill-rule="evenodd"
                                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
                    <div class="flex flex-col sm:flex-row">
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0"
                            href="{{ route('home') }}">Home</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{ route('shop.index') }}">Shop</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Não sei?</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Não sei?</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Sobre</a>
                    </div>
                </nav>
                <div class="relative mt-6 max-w-lg mx-auto">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                        <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                            <path
                                d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <form action="{{ route('search') }}" method="GET">
                        <input
                            class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline"
                            type="text" placeholder="Pesquisar..." autocomplete="off" name="query"
                            value="{{ request()->input('query') }}">
                    </form>
                </div>
            </div>
        </header>
        <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
            class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition z-50 duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
            <div class="flex items-center justify-between">
                <h3 class="text-2xl font-medium text-gray-700">Meu carrinho</h3>
                <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <hr class="my-3">
            @if (Cart::count() > 0)
                <a href="{{ route('cart.clear') }}" class="text-black">Limpar</a>
                @foreach (Cart::content() as $products)
                    <div class="flex justify-between mt-6">
                        <div class="flex">
                            <img class="h-20 w-20 object-cover rounded"
                                src="{{ asset('/images/' . $products->model->image) }}" alt="produto">
                            <div class="mx-3">
                                <h3 class="text-sm text-gray-600">{{ $products->model->product }}
                                </h3>
                                <div class="flex items-center mt-2">
                                    <form action="{{ route('cart.remove', $products->rowId) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                    <span class="text-gray-700 mx-2">{{ $products->qty }}</span>
                                    <form action="{{ route('cart.update', $products->rowId) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button class="text-gray-500 focus:outline-none focus:text-gray-600">
                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <span class="text-gray-600">R${{ $products->price * $products->qty }}</span>
                    </div>
                    <form action="{{ route('cart.destroy', $products->rowId) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="text-gray-600 focus:outline-none inline-flex">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </form>
                @endforeach
                <div class="mt-8">
                    <form class="flex items-center justify-center">
                        <input class="form-input w-48" type="text" placeholder="Add promocode">
                        <button
                            class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                            <span>Aplicar</span>
                        </button>
                    </form>
                </div>
                <a
                    class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <span>Checkout</span>
                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </a>
            @else
                <div class="flex justify-between mt-6">
                    <div class="flex">
                        <div class="mx-3">
                            <h3 class="text-sm text-gray-600">Carrinho vazio.</h3>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @yield('content')
        <footer class="bg-gray-800 pt-10 sm:mt-10">
            <div class="m-auto text-gray-800 flex flex-wrap max-w-6xl">
                <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
                    <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                        Title of objects
                    </div>

                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-100 text-sm font-medium duration-700">
                        Text of object
                    </a>
                </div>

                <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
                    <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                        Title of objects
                    </div>

                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-400 text-sm font-medium duration-700">
                        Text of object
                    </a>
                </div>

                <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
                    <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                        Customization
                    </div>

                    <a href="#" class="my-3 block text-gray-300 hover:text-gray-400 text-sm font-medium duration-700">
                        Text of object
                    </a>
                </div>

                <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
                    <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                        Contate-me
                    </div>

                    <a href="https://github.com/felipebrsk"
                        class="my-3 block text-gray-300 hover:text-gray-400 text-sm font-medium duration-700">
                        GitHub
                    </a>
                    <a href="https://twitter.com/FalidoL"
                        class="my-3 block text-gray-300 hover:text-gray-400 text-sm font-medium duration-700">
                        Twitter
                    </a>
                    <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5579998677272"
                        class="my-3 block text-gray-300 hover:text-gray-400 text-sm font-medium duration-700">
                        WhatsApp
                    </a>
                    <a href="https://www.linkedin.com/in/felipe-luz-oliveira/"
                        class="my-3 block text-gray-300 hover:text-gray-400 text-sm font-medium duration-700">
                        LinkedIn
                    </a>
                </div>
            </div>

            <div class="pt-2">
                <div class="flex pb-5 px-3 m-auto pt-5 
                    border-t border-gray-500 text-gray-400 text-sm 
                    flex-col md:flex-row max-w-6xl">
                    <div class="mt-2">
                        © Copyright 2021. Todos os direitos reservados.
                    </div>

                    <div class="md:flex-auto md:flex-row-reverse mt-2 flex-row flex">
                        <a href="#" class="w-6 mx-1" target="_blank">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                        <a href="#" class="w-6 mx-1" target="_blank">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5579998677272" class="w-6 mx-1"
                            target="_blank">
                            <i class="fab fa-whatsapp text-white"></i>
                        </a>
                        <a href="https://www.instagram.com/truenorthtechnology/" class="w-6 mx-1" target="_blank">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
        @livewireScripts
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>

</html>
