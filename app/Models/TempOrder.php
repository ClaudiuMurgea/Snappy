<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempOrder extends Model
{
    use HasFactory;

//      protected $fillable = [
//        'event_id',
//        'email',
//        'first_name',
//        'last_name',
//        'address',
//        'address2',
//        'city',
//        'state',
//        'zip',
//        'country',
//        'phone',
//        'product_id',
//        'product_modifier_id',
//        'product_modifier_option_id',
//        'carrier',
//        'tracking_number',
//        'snapchat_display_name',
//        'bitmoji_avatar',
//        'snapchat_external_id',
//    ];

    public function getCountryName($value)
    {
        $country = Country::find($value);
        $this->country = ($country) ? $country->name: "Undefined";
    }
}
