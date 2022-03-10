<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModifier extends Model
{
    use HasFactory;

    protected $fillable = ['name','label'];

    public function Options(){
        return $this->hasMany(ProductModifierOption::class,'product_modifier_id','id')->orderBy('order');
    }

}
