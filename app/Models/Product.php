<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'event_id',
        'product_modifier_id',
        'name',
        'description',
        'sku',
        'bitmoji_id',
    ];

    public function Stock ()
    {
        return $this->belongsTo(Stock::class, 'id', 'product_id');
    }

    public function Bitmoji ()
    {
        return $this->hasOne(Bitmoji::class, 'id', 'bitmoji_id');
    }

    public function Event ()
    {
        return $this->hasOne(Event::class, 'id', 'event_id');
    }

    public function ProductModifier ()
    {
        return $this->hasOne(ProductModifier::class, 'id', 'product_modifier_id');
    }

}
