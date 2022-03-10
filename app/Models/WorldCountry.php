<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldCountry extends Model
{
    use HasFactory;
    
    public function states(){
        return $this->hasMany(WorldDivision::class,'country_id');
    }
}
