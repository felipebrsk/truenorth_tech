<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;

class ApiProductController extends Controller
{
    public function index()
    {
        return Produto::all();
    }

    public function store(Request $request)
    {
        Produto::create($request->all());

        return response()->json(['success', 'Produto criado com sucesso!']);
    }

    public function show($id)
    {
        return Produto::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $product = Produto::findOrFail($id);

        $product->update($request->all());

        return response()->json(['success', 'Produto atualizado com sucesso!']);
    }

    public function destroy($id)
    {
        $product = Produto::findOrFail($id);

        $product->delete();

        return response()->json(['success', 'Produto removido com sucesso!']);
    }
}
