<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModifierOption extends Model
{
    use HasFactory;

    protected $fillable = ['product_modifier_id','name','order'];

    public function Modifier(){
        return $this->belongsTo(ProductModifier::class,'product_modifier_id','id');
    }

    public function Stock($product_id){
        return $this->hasOne(StockOption::class,'product_modifier_option_id','id')->where('product_id',$product_id)->first();
    }
}
