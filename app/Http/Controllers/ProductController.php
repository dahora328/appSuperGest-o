<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Provider;
use App\Models\Unity;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        $products = Product::with(['productDetail', 'provider'])->paginate(10);

        /*foreach($products as $key => $product){

            //print_r($product->getAttributes());
            //echo '<br>,<br>';

            $productDetail = ProductDetail::where('produto_id', $product->id)->first();
            if (isset($productDetail)){
              //  print_r($productDetail->getAttributes());

                $products[$key]['comprimento'] = $productDetail->comprimento;
                $products[$key]['altura'] = $productDetail->altura;
                $products[$key]['largura'] = $productDetail->largura;
            }
            //echo '<hr>';
        }*/

        return view('app.product.index', ['products' => $products, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unities = Unity::all();
        $providers = Provider::all();
        return view('app.product.create', ['unities' => $unities, 'providers' => $providers]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unities,id',
            'fornecedor_id' => 'exists:providers,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];

        $request->validate($rules, $feedback);

        Product::create($request->all());

        return redirect()->route('app.product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {

        return view('app.product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $unities = Unity::all();
        $providers = Provider::all();
        return view('app.product.edit', ['product' => $product, 'unities' => $unities, 'providers' => $providers]); //editar com outra tela de edição
        //return view('app.product.create', ['product' => $product, 'unities' => $unities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:3|max:2000',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unities,id',
            'fornecedor_id' => 'exists:providers,id'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];

        $request->validate($rules, $feedback);


        $product->update($request->all());
        return redirect()->route('product.show', ['product' => $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('app.product.index');
    }
}
