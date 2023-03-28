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
            'produto_id' => 'exists:products,id',
            'quantidade' => 'required'
        ];
        $feedback = [
            'produto_id.exists' => 'O produto informado não existe',
            'required' => 'O campo :attribute deve possuir um valor válido'
        ];

        $request->validate($rules, $feedback);

        /*$productDemand = new ProductDemand();
        $productDemand->pedido_id = $demand->id;
        $productDemand->produto_id = $request->get('produto_id');
        $productDemand->quantidade = $request->get('quantidade');
        $productDemand->save();*/

        /*$demand->products()->attach(
            $request->get('produto_id'),
            ['quantidade' => $request->get('quantidade')]
        ); //aqui passa o objeto como parametro*/

        $demand->products()->attach(
            $request->get('produto_id'),
            ['quantidade' => $request->get('quantidade')]
        ); //para inserir registros de vários formularios de uma só vez, passando todos como array associativo

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
     * @param  int ProductDemand $id
     * @return \Illuminate\Http\Response
     */
    //public function destroy(Demand $demand, Product $product)
    public function destroy(ProductDemand $productDemand, $demand_id)
    {

        //convendcional
        /*ProductDemand::where([
            'pedido_id' => $demand,
            'produto_id' => $product
        ])->delete();*/
        //detach (delete pelo relacionamento)

        //$demand->products()->detach($product->id);
        //pedido_id já está no contexto, sendo usando quando objeto está sendo instaciado

        $productDemand->delete();


        return redirect()->route('product-demand.create',['demand' => $demand_id]);
    }
}
