<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'category_id',
        'name',
        'start_date',
        'end_date',
        'background',
        'has_invite',
        'has_bitmoji',
        'hide_login_kit',
        'allowed_domains',
        'slug',
        'is_international',
        'image_position',
        'description',
        'address_required_fields',
        ];

    public function Category(){
        return $this->hasOne(Category::class,'id','category_id');
    }

    public function getAllowedDomainsAttribute($value){
        if(!is_null($value)){
            return json_decode($value);
        }
    }
    public function getAddressRequiredFieldsAttribute($value){
        if(!is_null($value)){
            return json_decode($value);
        }
    }
    public function Faqs(){
        return $this->hasMany(Faq::class,'event_id','id')->orderBy('order','ASC');
    }

    public function Products(){
        return $this->hasMany(Product::class,'event_id','id');
    }

    public function Error(){
        return $this->hasOne(EventErrors::class,'event_id','id');
    }

    public function Setting(){
        return $this->hasOne(Setting::class,'event_id','id');
    }

    public function FooterLinks(){
        return $this->hasMany(FooterLinks::class,'event_id','id');
    }
}
