<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'products_demands','pedido_id','produto_id')->withPivot('id','created_at');
    }
}
