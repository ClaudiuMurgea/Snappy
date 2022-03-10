<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['amount','product_id'];

    public function StockOption(){
        return $this->hasMany(StockOption::class,'product_modifier_id ','id');
    }

    public function Product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
