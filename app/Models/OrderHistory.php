<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderHistory extends Model
{

    protected $table = 'order_histories';

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'order_id',
        'status_description',
        'details',
        'date'
    ];

    public function Order ()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function OrderDetails ()
    {
        return $this->belongsTo(OrderDetail::class, 'order_details_id', 'id');
    }

}
