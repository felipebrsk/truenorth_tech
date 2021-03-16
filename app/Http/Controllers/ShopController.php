<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ShopController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $findProduct = Produto::find($id);

        $similarProducts = Produto::RandomSimilars()
        ->where('product', 'LIKE', $findProduct->product)
        ->orWhere('category_id', 'LIKE', $findProduct->category_id)
        ->orWhere('search_helper', 'LIKE', $findProduct->search_helper)
        ->orWhere('description', 'LIKE', $findProduct->description)
        ->get();
        
        return view('products.show', compact('findProduct', 'similarProducts'));
    }

    /**
     *  Search for a specified product.
     * 
     *  @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Produto::where('product', 'LIKE', "%$query%")
                            ->orWhere('description', 'LIKE', "%$query%")
                            ->orWhere('search_helper', 'LIKE', "%$query%")
                            ->paginate(8);

        return view('search-results', compact('results'));
    }

    /**
     *  See all ryzen 3000 processors
     *  
     *  @return \Illuminate\Http\Request
     */
    public function linhaRyzen()
    {
        $keyWord = 'linha 3000';

        $linhaRyzen = Produto::where('search_helper', 'LIKE', "%$keyWord%")->get();

        return view('products.lines')->with([
            'ryzen' => $linhaRyzen,
        ]);
    }

    /**
     *  See all intel 10th gen processors
     *  
     *  @return \Illuminate\Http\Request
     */
    public function linhaIntel()
    {
        $keyWord = '10th generation';

        $linhaIntel = Produto::where('search_helper', 'LIKE', "%$keyWord%")->get();

        return view('products.lines')->with([
            'intel' => $linhaIntel,
        ]);
    }
    
    /**
     *  See all intel 10th gen processors
     *  
     *  @return \Illuminate\Http\Request
     */
    public function linhaRtx()
    {
        $keyWord = '20 series';

        $linhaRtx = Produto::where('search_helper', 'LIKE', "%$keyWord%")->get();

        return view('products.lines')->with([
            'rtx' => $linhaRtx,
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
