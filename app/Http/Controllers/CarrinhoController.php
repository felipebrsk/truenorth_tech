<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dualCheck = \Cart::search(function($cartItem, $rowId) use ($request){
            return $cartItem->id === $request->id;
        });

        if($dualCheck->isNotEmpty()){
            return back()->withErrors('O item já se encontra no seu carrinho.');
        }

        \Cart::add($request->id, $request->product, 1, $request->price)->associate('App\Models\Produto');

        return back()->with('success_message', $request->product . ' foi adicionado ao carrinho.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $rowId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        $row = \Cart::get($rowId);
        $produtos = Produto::find($row->id);
        
        if($row->qty >= $produtos->current_inventory){
            return back()->withErrors('Infelizmente não temos essa quantidade em estoque.');
        }else{
            \Cart::update($rowId, $row->qty + 1);
            
            return back()->with('success_message', 'Carrinho atualizado.');
        }
    }
    /**
     *  Remove one unity of the cart.
     *  @param int $rowId
     *  @return \Illuminate\Http\Response
     */
    public function retirar($rowId)
    {
        $row = \Cart::get($rowId);

        \Cart::update($rowId, $row->qty - 1);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        \Cart::remove($rowId);

        return back();
    }
}
