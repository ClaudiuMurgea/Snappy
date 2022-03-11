<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\OrderCreated;

class Order extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'product_modifier_id',
        'product_modifier_option_id',
        'carrier_id',
        'order_details_id'
    ] ;
    // to do: implement email on save
    /*protected $dispatchesEvents = [
        'created' => OrderCreated::class
    ];*/

    public function Carrier ()
    {
        return $this->hasOne(Carrier::class, 'id', 'carrier_id');
    }

    public function Event ()
    {
        return $this->hasOne(Event::class, 'id', 'event_id');
    }

    public function Invite ()
    {
        return $this->hasOne(Invite::class, 'id', 'invite_id');
    }

    public function OrderDetail ()
    {
        return $this->hasOne(OrderDetail::class, 'id', 'order_details_id');
    }

    // public function Product ()
    // {
    //     return $this->belongsTo(Product::class,'product_id','id');
    // }

    // public function TrashedProduct ()
    // {
    //     return $this->belongsTo(Product::class,'product_id','id')->withTrashed();
    // }

}
