<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>TrueNorth Technology - Produtos</title>
</head>

<body class="antialiased font-sans bg-gray-200">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="py-8">
            @if (session()->has('success_message'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
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
            <div>
                <h2 class="text-2xl font-semibold leading-tight">
                    <p>Produtos</p>
                </h2>
            </div>
            <div class="my-2">
                <div class="flex justify-between">
                    <div class="flex flex-row mb-1 sm:mb-0">
                        <div class="relative">
                            <form action="{{ route('product.search') }}" method="GET" class="h-full" id="filter">
                            <select name="paginate"
                                class="appearance-none h-full rounded-l border block w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="5" selected>5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        <div class="relative">
                            <select name="stock"
                                class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                <option disabled selected>Todos</option>
                                <option value="1">Em estoque</option>
                                <option value="0">Em falta</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        <div class="block relative">
                            <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                    <path
                                        d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                    </path>
                                </svg>
                            </span>
                                <input placeholder="Pesquisar..." name="q" value="{{ request()->input('q') }}"
                                    class="appearance-none h-full rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                            </form>
                        </div>
                        <div class="block relative">
                                <button type="submit" form="filter"
                                    class="appearance-none h-full rounded-r text-white sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-gray-600 text-sm placeholder-gray-400 hover:bg-gray-700 focus:outline-none">
                                    Filtrar
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="sm:flex sm:flex-wrap sm:ml-4">
                        <a href="{{ route('home') }}"
                            class="bg-gray-900 rounded px-4 text-gray-200 py-3 text-xs font-semibold hover:bg-gray-800 sm:mr-4">
                            Voltar para home
                        </a>
                        <a href="{{ route('product.create') }}"
                            class="bg-gray-900 rounded px-4 text-gray-200 py-3 text-xs font-semibold hover:bg-gray-800 mt-px">
                            Cadastrar produto
                        </a>
                    </div>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    ID
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Produto
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Estoque
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Preço
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Status
                                </th>
                                <th
                                    class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($productQuery))
                                @foreach ($productQuery as $products)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $products->id }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-full h-full rounded-full"
                                                        src="{{ asset('/images/' . $products->image) }}"
                                                        alt="produto" />
                                                </div>
                                                <div class="ml-3 w-64">
                                                    <p class="text-gray-900 break-words">
                                                        {{ $products->product }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $products->current_inventory }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                R${{ $products->price }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            @if ($products->estoque == 1)
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">Em estoque</span>
                                                </span>
                                            @else
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">Em falta</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm md:flex-none flex-wrap md:mt-4 mt-4">
                                            <a href="{{ route('shop.show', $products->id) }}"
                                                class="font-bold py-1 px-3 rounded text-xs bg-blue-400 hover:bg-blue-500">Ver</a>
                                            <a href="{{ route('product.edit', $products->id) }}"
                                                class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green-400 hover:bg-green-500">Editar</a>
                                            <a href="javascript:if(confirm('Deseja realmente excluir?')){
                                        window.location.href ='{{ route('product.excluir', $products->id) }}'
                                    }" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-red-400 hover:bg-red-500">Excluir</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                @foreach ($produtos as $products)
                                    <tr>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $products->id }}</p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-full h-full rounded-full"
                                                        src="{{ asset('/images/' . $products->image) }}"
                                                        alt="produto" />
                                                </div>
                                                <div class="ml-3 w-64">
                                                    <p class="text-gray-900 break-words">
                                                        {{ $products->product }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $products->current_inventory }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                R${{ $products->price }}
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            @if ($products->estoque == 1)
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">Em estoque</span>
                                                </span>
                                            @else
                                                <span
                                                    class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">Em falta</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <a href="{{ route('shop.show', $products->id) }}"
                                                class="font-bold py-1 px-3 rounded text-xs bg-blue-400 hover:bg-blue-500">Ver</a>
                                            <a href="{{ route('product.edit', $products->id) }}"
                                                class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green-400 hover:bg-green-500">Editar</a>
                                            <a href="javascript:if(confirm('Deseja realmente excluir?')){
                                            window.location.href ='{{ route('product.excluir', $products->id) }}'
                                        }" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-red-400 hover:bg-red-500">Excluir</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if (isset($productQuery))
                        <div
                            class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                            <span class="text-xs xs:text-sm text-gray-900">
                                Mostrando {{ $productQuery->count() }} de
                                {{ $productQuery->total() }} resultados
                            </span>
                            <div class="inline-flex mt-2 xs:mt-0">
                                @if ($productQuery->previousPageUrl() != null)
                                    <a href="{{ $productQuery->appends(Request::all())->previousPageUrl() }}"
                                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                        Anterior
                                    </a>
                                @else

                                @endif
                                @if ($productQuery->nextPageUrl() != null)
                                    <a href="{{ $productQuery->appends(Request::all())->nextPageUrl() }}"
                                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                        Próxima
                                    </a>
                                @else

                                @endif
                            </div>
                        </div>
                    @else
                        <div
                            class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                            <span class="text-xs xs:text-sm text-gray-900">
                                Mostrando {{ $produtos->count() }} de
                                {{ $produtos->total() }} resultados
                            </span>
                            <div class="inline-flex mt-2 xs:mt-0">
                                @if ($produtos->previousPageUrl() != null)
                                    <a href="{{ $produtos->previousPageUrl() }}"
                                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                        Anterior
                                    </a>
                                @else

                                @endif
                                @if ($produtos->nextPageUrl() != null)
                                    <a href="{{ $produtos->nextPageUrl() }}"
                                        class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                        Próxima
                                    </a>
                                @else

                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>

</html>
