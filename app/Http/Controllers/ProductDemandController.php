<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use App\Models\Product;
use App\Models\ProductDemand;
use Illuminate\Http\Request;

class ProductDemandController extends Controller
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
    public function create(Demand $demand)
    {
        $products = Product::all();
        $demand->products; //eager loading
        return view('app.product_demand.create', ['demand' => $demand, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Demand $demand)
    {
        $rules = [
            'produto_id' => 'exists:products,id'
        ];
        $feedback = [
            'produto_id.exists' => 'O produto informado não existe'
        ];

        $request->validate($rules, $feedback);

        $productDemand = new ProductDemand();
        $productDemand->pedido_id = $demand->id;
        $productDemand->produto_id = $request->get('produto_id');
        $productDemand->save();

        return redirect()->route('product-demand.create', ['demand' => $demand->id]);
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
