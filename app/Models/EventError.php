<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventError extends Model
{

    use HasFactory;

    protected $fillable = ['event_id','not_found','claimed'];

    public function Event ()
    {
        return $this->belongsTo(Event::class,'event_id','id');
    }

}
