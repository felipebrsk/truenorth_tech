<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('/storage/upload/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('/storage/upload/favicon.ico') }}" type="image/x-icon">
    <style type="text/css">
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }

            to {
                opacity: 1
            }
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/grid.css') }}">
    @livewireStyles
    <title>TrueNorth Technology - O verdadeiro norte da tecnologia!</title>
</head>

<body>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <header class="w-full">
        <nav class="bg-gray-50 shadow-lg">
            <div class="md:flex items-center justify-between py-2 px-8 md:px-12">
                <div class="flex justify-between items-center">
                    <div class="text-2x1 font-bold text-gray-800 md:text-3x1">
                        <a href="{{ route('home') }}"><img src="{{ asset('/images/logo.png') }}" alt="logo"
                                width="40" class="inline-flex"> TrueNorth</a>
                    </div>
                    <div class="md:hidden" x-data="{ isOpen: false }">
                        <button type="button" @click="isOpen = true"
                            class="block text-gray-900 hover:text-gray-700 focus:text-gray-700 focus:outline-none">
                            <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
                                <path class="hidden"
                                    d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z" />
                                <path
                                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
                            </svg>
                        </button>
                        <div x-show="isOpen" @click.away="isOpen = false" @keydown.window.escape="isOpen = false"
                            x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="origin-top-right absolute right-0 mt-2 mr-1 w-24 rounded-md shadow-lg">
                            <div class="text-xs m-auto">
                                @if (Auth::user())
                                    <!-- Style bug color on mobiles -->
                                    <a href="{{ route('home') }}"
                                        class="bg-gray-900 text-white block px-3 py-2 rounded-md text-center"
                                        style="color:white;">Home</a>
                                    <div x-data="{ cartOpen: false , isOpen: false }" class="inline-flex"
                                        @click.away="cartOpen = false" @keydown.escape.window="cartOpen = false">
                                        <button @click="cartOpen = !cartOpen"
                                            class="bg-gray-900 text-white block px-3 py-2 rounded-md text-center mt-px">
                                            Meu carrinho
                                        </button>
                                        <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
                                            class="fixed right-0 z-50 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-2xl font-medium text-gray-700">Meu carrinho</h3>
                                                <button @click="cartOpen = !cartOpen"
                                                    class="text-gray-600 focus:outline-none">
                                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                        stroke="currentColor">
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
                                                                src="{{ asset('/images/' . $products->model->image) }}"
                                                                alt="produto">
                                                            <div class="mx-3">
                                                                <h3 class="text-sm text-gray-600">
                                                                    {{ $products->model->product }}
                                                                </h3>
                                                                <div class="flex items-center mt-2">
                                                                    <form
                                                                        action="{{ route('cart.remove', $products->rowId) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        {{ method_field('PATCH') }}
                                                                        <button
                                                                            class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                                            <svg class="h-5 w-5" fill="none"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                viewBox="0 0 24 24"
                                                                                stroke="currentColor">
                                                                                <path
                                                                                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                                </path>
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                    <span
                                                                        class="text-gray-700 mx-2">{{ $products->qty }}</span>
                                                                    <form
                                                                        action="{{ route('cart.update', $products->rowId) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        {{ method_field('PATCH') }}
                                                                        <button
                                                                            class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                                            <svg class="h-5 w-5" fill="none"
                                                                                stroke-linecap="round"
                                                                                stroke-linejoin="round" stroke-width="2"
                                                                                viewBox="0 0 24 24"
                                                                                stroke="currentColor">
                                                                                <path
                                                                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                                </path>
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span
                                                            class="text-gray-600">R${{ $products->price * $products->qty }}</span>
                                                    </div>
                                                    <form action="{{ route('cart.destroy', $products->rowId) }}"
                                                        method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        <button class="text-gray-600 focus:outline-none inline-flex">
                                                            <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                viewBox="0 0 24 24" stroke="currentColor">
                                                                <path d="M6 18L18 6M6 6l12 12"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endforeach
                                                <div class="mt-8">
                                                    <form class="flex items-center justify-center">
                                                        <input
                                                            class="form-input w-48 focus:outline-none text-black focus:ring-1 focus:ring-gray-600 rounded"
                                                            type="text" placeholder="Código">
                                                        <button
                                                            class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                            <span>Aplicar</span>
                                                        </button>
                                                    </form>
                                                </div>
                                                <a
                                                    class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                    <span>Checkout</span>
                                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                        stroke="currentColor">
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
                                    </div>
                                    <a href="#"
                                        class="bg-gray-900 text-white block px-3 py-2 rounded-md text-center mt-px">Contato</a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                                        class="bg-gray-900 text-white block px-3 py-2 rounded-md text-center mt-px"
                                        style="color:white;">Logout</a>
                                @else
                                    <a href="{{ route('home') }}"
                                        class="bg-gray-900 text-white block px-3 py-2 rounded-md text-center"
                                        style="color:white;">Home</a>
                                    <a href="{{ route('login') }}"
                                        class="bg-gray-900 text-white block px-3 py-2 rounded-md text-center mt-px"
                                        style="color:white;">Login</a>
                                    <a href="{{ route('register') }}"
                                        class="bg-gray-900 text-white block px-3 py-2 rounded-md text-center mt-px">Cadastro</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row hidden md:block -mx-2">
                    @if (Auth::user())
                        <a href="{{ route('home') }}"
                            class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Home</a>
                        @if (Auth::user()->role_id === 1)
                            <a href="{{ route('product.index') }}"
                                class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Produtos</a>
                        @endif
                        <div x-data="{ cartOpen: false , isOpen: false }" class="inline-flex"
                            @click.away="cartOpen = false" @keydown.escape.window="cartOpen = false">
                            <button @click="cartOpen = !cartOpen"
                                class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2 focus:outline-none">
                                Meu carrinho
                            </button>
                            <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
                                class="fixed right-0 z-50 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-2xl font-medium text-gray-700">Meu carrinho</h3>
                                    <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                                        <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
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
                                                    src="{{ asset('/images/' . $products->model->image) }}"
                                                    alt="produto">
                                                <div class="mx-3">
                                                    <h3 class="text-sm text-gray-600">{{ $products->model->product }}
                                                    </h3>
                                                    <div class="flex items-center mt-2">
                                                        <form action="{{ route('cart.remove', $products->rowId) }}"
                                                            method="POST">
                                                            @csrf
                                                            {{ method_field('PATCH') }}
                                                            <button
                                                                class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                                <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                        <span class="text-gray-700 mx-2">{{ $products->qty }}</span>
                                                        <form action="{{ route('cart.update', $products->rowId) }}"
                                                            method="POST">
                                                            @csrf
                                                            {{ method_field('PATCH') }}
                                                            <button
                                                                class="text-gray-500 focus:outline-none focus:text-gray-600">
                                                                <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path
                                                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                    </path>
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <span
                                                class="text-gray-600">R${{ $products->price * $products->qty }}</span>
                                        </div>
                                        <form action="{{ route('cart.destroy', $products->rowId) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="text-gray-600 focus:outline-none inline-flex">
                                                <svg class="h-5 w-5" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    @endforeach
                                    <div class="mt-8">
                                        <form class="flex items-center justify-center">
                                            <input
                                                class="form-input w-48 focus:outline-none text-black focus:ring-1 focus:ring-gray-600 rounded"
                                                type="text" placeholder="Código">
                                            <button
                                                class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                                <span>Aplicar</span>
                                            </button>
                                        </form>
                                    </div>
                                    <a
                                        class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                        <span>Checkout</span>
                                        <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
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
                        </div>
                        <a href="#"
                            class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Contato</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"
                            class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Logout</a>
                    @else
                        <a href="{{ route('home') }}"
                            class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Home</a>
                        <a href="{{ route('login') }}"
                            class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Login</a>
                        <a href="{{ route('register') }}"
                            class="text-gray-800 rounded hover:bg-gray-900 hover:text-gray-100 hover:font-medium py-2 px-2 md:mx-2">Cadastro</a>
                    @endif
                </div>
            </div>
        </nav>
        <div class="flex bg-white">
            <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                <div>
                    <h2 class="text-3x1 font-semibold text-gray-800 md:text-4x1">
                        Construa o seu mundo <span class="text-indigo-600">aqui.</span>
                    </h2>
                    <p class="mt-2 text-sm text-gray-500 md:text-base">
                        Somos uma empresa focada em produtos tecnológicos para facilitar a sua vida!
                        Monte o seu estilo gamer.
                        TrueNorth Technology, a empresa que fala a sua língua.
                    </p>
                    <div class="flex justify-center lg:justify-start mb-6 mt-6">
                        <a href="{{ route('shop.index') }}"
                            class="bg-gray-900 rounded px-4 text-white py-3 text-xs font-semibold hover:bg-gray-800" style="color: white;">
                            Shop
                        </a>
                        <a href="#" class="mx-2 px-4 py-3 bg-gray-300 text-gray-900 rounded text-xs hover:bg-gray-400">
                            Link 2
                        </a>
                    </div>
                </div>
            </div>
            <div class="hidden lg:block lg:w-1/2" style="clip-path: polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
                <div class="h-full object-fit mySlides fade">
                    <img src="{{ asset('/images/poseidon-asus-rog-video-card.jpg') }}" alt="promo">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
                <div class="h-full object-fit mySlides fade">
                    <img src="{{ asset('/images/2325957.jpg') }}" alt="promo">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
                <div class="h-full object-fit mySlides fade">
                    <img src="{{ asset('/images/2326031.jpg') }}" alt="promo">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
                <div class="h-full object-fit mySlides fade">
                    <img src="{{ asset('/images/2145606.jpg') }}" alt="promo">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
                <div class="h-full object-fit mySlides fade">
                    <img src="{{ asset('/images/81669.jpg') }}" alt="promo">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
                <div class="h-full object-fit mySlides fade">
                    <img src="{{ asset('/images/656462.jpg') }}" alt="promo">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
                <div class="h-full object-fit mySlides fade">
                    <img src="{{ asset('/images/112327.jpg') }}" alt="promo">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
                <div class="h-full object-fit mySlides fade">
                    <img src="{{ asset('/images/5449767.jpg') }}" alt="promo">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
                <div class="h-full object-fit mySlides fade">
                    <img src="{{ asset('/images/291065.jpg') }}" alt="promo">
                    <div class="h-full bg-black opacity-25"></div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer class="bg-gray-800 pt-10 sm:mt-10">
        <div class="m-auto flex flex-wrap max-w-6xl text-white">
            <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
                <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                    Title of objects
                </div>

                <a href="#" class="my-3 block hover:text-gray-400 text-sm font-medium duration-700">
                    Text of object
                </a>
            </div>

            <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
                <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                    Title of objects
                </div>

                <a href="#" class="my-3 block hover:text-gray-400 text-sm font-medium duration-700">
                    Text of object
                </a>
            </div>

            <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12">
                <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                    Customization
                </div>

                <a href="#" class="my-3 block hover:text-gray-400 text-sm font-medium duration-700">
                    Text of object
                </a>
            </div>

            <div class="p-5 w-1/2 sm:w-4/12 md:w-3/12 text-white">
                <div class="text-xs uppercase text-gray-400 font-medium mb-6">
                    Contate-me
                </div>

                <a href="https://github.com/felipebrsk"
                    class="my-3 block hover:text-gray-400 text-sm font-medium duration-700">
                    GitHub
                </a>
                <a href="https://twitter.com/FalidoL"
                    class="my-3 block hover:text-gray-400 text-sm font-medium duration-700">
                    Twitter
                </a>
                <a href="https://api.whatsapp.com/send?1=pt_BR&phone=5579998677272"
                    class="my-3 block hover:text-gray-400 text-sm font-medium duration-700">
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
                    <a href="https://www.facebook.com/felipe.brsk" class="w-6 mx-1" target="_blank">
                        <i class="fab fa-facebook-f text-white"></i>
                    </a>
                    <a href="https://twitter.com/FalidoL" class="w-6 mx-1" target="_blank">
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
    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 4000); // Change image every 4 seconds
        }

    </script>
</body>

</html>
