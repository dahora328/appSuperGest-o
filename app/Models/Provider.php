<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(string[] $array)
 */
class Provider extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'fornecedor_id', 'id');
    }
}
