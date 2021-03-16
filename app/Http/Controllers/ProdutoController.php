<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Tipo;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::paginate(4);

        return view('products.index', compact('produtos'));
    }

    public function search(Request $request)
    {
        
        $query = $request->input('q');

        $search = Produto::where('product', 'LIKE', "%$query%")
        ->orWhere('search_helper', 'LIKE', "%$query%")
        ->orWhere('description', 'LIKE', "%$query%")
        ->paginate(4);

        return view('products.index', compact('search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $unidades = Unidade::all();
        $tipo = Tipo::all();
        return view('products.create')->with([
            'category' => $categorias,
            'unity' => $unidades,
            'type' => $tipo,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'product' => 'required|unique:produtos|min:5',
            'price' => 'required',
            'current_inventory' => 'required',
            'description' => 'required|min:15',
            'category_id' => 'required',
            'unity_id' => 'required',
            'type_id' => 'required',
        ]);

        $produto = new Produto;
        $produto->product = $request->product;
        $produto->category_id = $request->category_id;
        $produto->unity_id = $request->unity_id;
        $produto->type_id = $request->type_id;
        $produto->price = $request->price;
        $produto->best_seller = 0;
        $produto->current_inventory = $request->current_inventory;
        $produto->search_helper = $request->search_helper;
        $produto->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/images/' . $filename);
            \Image::make($image)->resize(800, 700)->save($location);
            $produto->image = $filename;
        }
        $produto->save();
            

        return redirect()->route('product.index')->with('success_message', 'Produto cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $findProduct = Produto::find($id);
        $category = Categoria::all();
        $unity = Unidade::all();
        $type = Tipo::all();

        return view('products.create', compact('findProduct', 'category', 'unity', 'type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateProduct = Produto::find($id);

        $updateProduct->product = $request->product;
        $updateProduct->price = $request->price;
        $updateProduct->current_inventory = $request->current_inventory;
        $updateProduct->description = $request->description;
        $updateProduct->category_id = $request->category_id;
        $updateProduct->unity_id = $request->unity_id;
        $updateProduct->type_id = $request->type_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/images/' . $filename);
            \Image::make($image)->resize(800, 700)->save($location);
            if($updateProduct->image != null){
                Storage::delete($updateProduct->image);
                unlink(public_path('/images/' . $updateProduct->image));
            }
            $updateProduct->image = $filename;
        }
        $updateProduct->save();

        return redirect()->route('product.index')->with('success_message', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function excluir($id)
    {
        $destroyProduct = Produto::find($id);

        if($destroyProduct){
            if($destroyProduct->image != null){
                unlink(public_path('/images/' . $destroyProduct->image));
            }

            $destroyProduct->delete();

            return redirect()->route('product.index')->with('success_message', 'Produto excluído com sucesso.');
        }else{
            return back();
        }
    }
}
