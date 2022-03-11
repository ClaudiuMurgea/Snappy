<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

    use HasFactory;

    public function Event ()
    {
        return $this->belongsTo(Event::class,'event_id','id');
    }

    public function Order () 
    {
        return $this->belongsTo(Event::class,'order_id','id');
    }
    
}
