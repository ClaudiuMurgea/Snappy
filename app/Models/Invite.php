<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invite extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['event_id','first_name','last_name','email', 'redeemed'];

    public function Event(){
        return $this->belongsTo(Event::class,'event_id','id');
    }
}
