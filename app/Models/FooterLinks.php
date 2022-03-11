<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterLinks extends Model
{ 

    use HasFactory;

    protected $fillable = ['id', 'url', 'label'];

    // public function Event ()
    // {
    //     return $this->belongsTo(Event::class,'event_id','id');
    // }

}
