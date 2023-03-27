<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDemandController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProviderController;
use App\Http\Middleware\AcessLogMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'home'])->name('site.home')->middleware('acess.log');
Route::get('/contato', [ContactController::class,'contact'])->name('site.contact');
Route::post('/contato', [ContactController::class,'save'])->name('site.contact');
Route::get('/sobrenos', [AboutController::class,'about'])->name('site.about');
Route::get('/login/{erro?}', [LoginController::class,'index'])->name('site.login');
Route::post('/login', [LoginController::class,'authenticate'])->name('site.login');

Route::middleware('authentication')->prefix('/app')->group(function (){
    Route::get('/home', [HomeController::class,'index'])->name('app.home');
    Route::get('/exit', [LoginController::class,'exit'])->name('app.exit');
    Route::get('/produto', [ProductController::class,'index'])->name('app.product');
    Route::get('/produto/show/{product}', [ProductController::class,'show'])->name('product.show');
    Route::get('/produto/create', [ProductController::class,'create'])->name('app.product.create');
    Route::post('/produto/store', [ProductController::class,'store'])->name('app.product.store');
    Route::get('/produto/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
    Route::put('/produto/{product}',[ProductController::class,'update'])->name('product.update');
    Route::delete('/produto/{product}',[ProductController::class,'destroy'])->name('product.destroy');
    Route::get('/fornecedor',[ProviderController::class,'index'])->name('app.provider');
    Route::post('/fornecedor/listar',[ProviderController::class,'list'])->name('app.provider.list');
    Route::get('/fornecedor/listar',[ProviderController::class,'list'])->name('app.provider.list');
    Route::get('/fornecedor/adicionar',[ProviderController::class,'add'])->name('app.provider.add');
    Route::get('/fornecedor/voltar',[ProviderController::class,'index'])->name('app.provider.index');
    Route::post('/fornecedor/adicionar',[ProviderController::class,'add'])->name('app.provider.add');
    Route::get('/fornecedor/editar/{id}/{msg?}',[ProviderController::class,'edit'])->name('app.provider.edit');
    Route::get('/fornecedor/excluir/{id}/',[ProviderController::class,'delete'])->name('app.provider.delete');

    //produtos detalhes
    Route::resource('product-detail', ProductDetailController::class);

    //clientes
    Route::resource('client', ClientController::class);

    //pedidos
    Route::resource('demand', DemandController::class);

    //pedidos produtos
    //Route::resource('product-demand', ProductDemandController::class);
    Route::get('/pedido-produto/create/{demand}', [ProductDemandController::class,'create'])->name('product-demand.create');
    Route::post('/pedido-produto/store/{demand}', [ProductDemandController::class,'store'])->name('product-demand.store');
    Route::delete('/pedido-produto/destroy/{demand}/{product}', [ProductDemandController::class,'destroy'])->name('product-demand.destroy');
});

Route::fallback(function (){
    echo 'A rota acessada não existe. <a href="'.route('site.home').'">clique aqui</a> para voltar a página inicial';
});
