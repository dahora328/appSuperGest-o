<?php

namespace App\Http\Controllers;

use App\Models\ProductDetail;
use App\Models\Unity;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
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
        $unities = Unity::all();
        return view('app.product_detail.create', ['unities' => $unities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductDetail::create($request->all());
        echo 'Cadastro realizado';
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
     * @param  App\Models\ProductDetail $productDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetail $productDetail)
    {
        $unities = Unity::all();
        return view('app.product_detail.edit', ['product_detail' => $productDetail, 'unities' => $unities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\ProductDetail $productDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDetail $productDetail)
    {
        $productDetail->update($request->all());
        echo 'Atualização feita';
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
