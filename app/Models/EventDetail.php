<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventDetail extends Model
{

    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'background',
        'start_date',
        'end_date',
        'has_bitmoji',
        'hide_login_kit',
        'has_invite',
        'allow_domains',
        // 'is_international',
        // 'image_position',
        // 'address_required_fields',
    ];
    
}
