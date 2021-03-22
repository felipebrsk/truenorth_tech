<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <title>TrueNorth Technology - Cadastro de Produtos</title>
</head>

<body>
    <h1 class="font-bold text-5xl flex justify-center mt-4">
        Cadastrar produto
    </h1>
    <div class="p-5">
        <div class="mt-2">
            @if (isset($findProduct))
                <form action="{{ route('product.update', $findProduct->id) }}" enctype="multipart/form-data"
                    method="POST">
                    <input type="hidden" name="_method" value="PUT">
                @else
                    <form enctype="multipart/form-data" method="POST" action="{{ route('product.store') }}">
            @endif
            @csrf
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
            <div class="flex flex-col md:flex-row border-b border-gray-200 pb-4 mb-4">
                <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Produto principal</div>
                <div class="flex-1 flex flex-col md:flex-row">
                    <div class="w-full flex-1 mx-2">
                        <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                            <input placeholder="Nome do produto" type="text" name="product"
                                class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "
                                value="{{ isset($findProduct->product) ? $findProduct->product : old('product') }}">
                        </div>
                    </div>
                    <div class="w-full flex-1 mx-2">
                        <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                            <input type="file" name="image" accept="image/*"
                                class="p-1 px-2 appearance-none outline-none w-full text-gray-800 "
                                value="{{ isset($findProduct->image) ? $findProduct->image : old('image') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row pb-4 mb-4">
                <div class="w-64 font-bold h-6 mx-2 mt-3 text-gray-800">Informações do produto
                    <div class="text-xs font-normal leading-none text-gray-500">Nenhum valor pode ser nulo
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex flex-col md:flex-row">
                        <div class="w-full flex-1 mx-2">
                            <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                <select class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                                    name="category_id">
                                    <option aria-checked="true" selected disabled>Selecione uma categoria</option>
                                    @foreach ($category as $categ)
                                        <option value="{{ $categ->id }}" @if (isset($findProduct)) {{ $categ->id == $findProduct->category_id ? 'selected' : '' }} @endif>{{ $categ->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex-1 mx-2">
                            <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                <select class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                                    name="unity_id">
                                    <option aria-checked="true" selected disabled>Selecione o tipo de unidade</option>
                                    @foreach ($unity as $unit)
                                        <option value="{{ $unit->id }}" @if (isset($findProduct)) {{ $unit->id == $findProduct->unity_id ? 'selected' : '' }} @endif>{{ $unit->unity_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex-1 mx-2">
                            <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                <select class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                                    name="type_id">
                                    <option aria-checked="true" selected disabled>Selecione o tipo do produto</option>
                                    @foreach ($type as $tipo)
                                        <option value="{{ $tipo->id }}" @if (isset($findProduct)) {{ $tipo->id == $findProduct->type_id ? 'selected' : '' }} @endif>{{ $tipo->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex-1 mx-2">
                            <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                <select class="p-1 px-2 appearance-none outline-none w-full text-gray-800"
                                    name="best_seller">
                                    <option aria-checked="true" selected disabled>Setar como mais vendido</option>
                                    <option value="1" @if (isset($findProduct)) {{ $findProduct->best_seller ? 'selected' : '' }} @endif>Mais vendido</option>
                                    <option value="0">Remover</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex-1 mx-2">
                            <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                <select class="p-1 px-2 appearance-none outline-none w-full text-gray-800" name="new">
                                    <option aria-checked="true" selected disabled>Setar como lançamento</option>
                                    <option value="1" @if (isset($findProduct)) {{ $findProduct->new ? 'selected' : '' }} @endif>
                                        Lançamento</option>
                                    <option value="0">Remover</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex flex-col md:flex-row">
                            <div class="w-full flex-1 mx-2">
                                <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                    <span class="mt-1 pl-1 text-gray-400">R$</span>
                                    <input placeholder="Preço" name="price" type="number" step="0.01"
                                        value="{{ isset($findProduct->price) ? $findProduct->price : old('price') }}"
                                        class="p-1 px-2 appearance-none outline-none w-full text-gray-800" />
                                </div>
                            </div>
                            <div class="w-full flex-1 mx-2">
                                <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                    <input placeholder="Quantidade em estoque" name="current_inventory" type="number"
                                        value="{{ isset($findProduct->current_inventory) ? $findProduct->current_inventory : old('current_inventory') }}"
                                        class="p-1 px-2 appearance-none outline-none w-full text-gray-800" />
                                </div>
                            </div>
                            <div class="w-full flex-1 mx-2">
                                <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                    <input placeholder="Palavras chave para pesquisa (opcional)" name="search_helper"
                                        value="{{ isset($findProduct->search_helper) ? $findProduct->search_helper : old('search_helper') }}"
                                        class="p-1 px-2 appearance-none outline-none w-full text-gray-800" />
                                </div>
                            </div>
                            <div class="w-full flex-1 mx-2">
                                <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                    <select name="stock"
                                        class="p-1 px-2 appearance-none outline-none w-full text-gray-800">
                                        <option value="1">Em estoque</option>
                                        <option value="0">Em falta</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="m-2">
                            <div class="w-full flex-1">
                                <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                    <input placeholder="Descrição do produto" name="description" type="text"
                                        value="{{ isset($findProduct->description) ? $findProduct->description : old('description') }}"
                                        class="p-1 px-2 appearance-none outline-none w-full text-gray-800" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row">
                <div class="w-64 mx-2 font-bold h-6 mt-3 text-gray-800"></div>
                <div class="flex-1 flex flex-col md:flex-row">
                    <button class="text-sm  mx-2 w-32  focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
            hover:bg-green-700 hover:text-green-100 
            bg-green-100 
            text-green-700 
            border duration-200 ease-in-out 
            border-green-600 transition">Salvar</button>
                </div>
            </div>
            </form>
            </form>
            @if (isset($findProduct))
                <hr class="mt-4 mb-4" />
                <label class="font-bold">Imagens do produto</label>
                <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="m-2">
                        <div class="w-full flex-1">
                            <div class="my-2 p-1 bg-white flex border border-gray-200 rounded">
                                <input placeholder="Descrição do produto" name="images[]" type="file" accept="image/*"
                                    class="p-1 px-2 appearance-none outline-none w-full text-gray-800" multiple />
                                <input type="hidden" name="product_id" value="{{ $findProduct->id }}">
                            </div>
                        </div>
                    </div>
                    <button class="text-sm  mx-2 w-32  focus:outline-none flex justify-center px-4 py-2 rounded font-bold cursor-pointer 
            hover:bg-green-700 hover:text-green-100 
            bg-green-100 
            text-green-700 
            border duration-200 ease-in-out 
            border-green-600 transition">Salvar</button>
                </form>
            @endif
        </div>
    </div>
</body>

</html>
