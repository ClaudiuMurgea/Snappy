<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    use HasFactory;

    protected $fillable = ['amount','product_id'];

    // public function StockOptions ()
    // {
    //     return $this->hasMany(StockOption::class, 'id', 'product_modifier_id');
    // }

    public function Product ()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
