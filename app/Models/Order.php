<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Events\OrderCreated;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [] ;
    // to do: implement email on save
    /*protected $dispatchesEvents = [
        'created' => OrderCreated::class
    ];*/

    public function Event(){
        return $this->belongsTo(Event::class,'event_id','id');
    }

    public function Products(){
        return $this->hasMany(OrderProduct::class);
    }


    public function Invite(){
        return  $this->belongsTo(Invite::class,'invite_id','id');
    }

    public function Carrier(){
        return $this->hasOne(Carrier::class,'id','carrier_id');
    }

    public function History(){
        return $this->hasMany(OrderHistory::class,'order_id','id')->orderBy('date','DESC');
    }
}
