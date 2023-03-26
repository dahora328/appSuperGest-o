<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id','fornecedor_id'];


    public function productDetail()
    {
        return $this->hasOne('App\Models\ProductDetail', 'produto_id');
    }

    public function provider()
    {
        return $this->belongsTo('App\Models\Provider', 'fornecedor_id');
    }
    public function demands()
    {
        return $this->belongsToMany('App\Models\Demand','products_demands','produto_id', 'pedido_id');
    }
}
