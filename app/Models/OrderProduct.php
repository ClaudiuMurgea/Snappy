<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{

    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function Order ()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }
    
    public function Product ()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
    public function TrashedProduct ()
    {
        return $this->belongsTo(Product::class,'product_id','id')->withTrashed();
    }

    public function Modifier ()
    {
        return $this->belongsTo(ProductModifier::class,'product_modifier_id','id');
    }

    public function ModifierOption ()
    {
        return $this->belongsTo(ProductModifierOption::class,'product_modifier_option_id','id');
    }
}
