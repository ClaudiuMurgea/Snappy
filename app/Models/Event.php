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
        'event_details_id',
        'category_id',
        'domain_id',
        'invite_id',
        'bitmoji_id',
        ];

    public function EventDetail ()
    {
        return $this->hasOne(EventDetail::class, 'id', 'event_details_id');
    }

    public function Domains ()
    {
        return $this->hasMany(Domain::class, 'id', 'domain_id');
    }

    public function Invite ()
    {
        return $this->hasOne(Invite::class, 'id', 'invite_id');
    }

    public function Bitmoji ()
    {
        return $this->hasOne(Bitmoji::class, 'id', 'botmoji_id');
    }

    public function Category ()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function Products ()
    {
        return $this->hasMany(Product::class, 'event_id', 'id');
    }
    
    public function Setting ()
    {
        return $this->hasOne(Setting::class, 'event_id', 'id');
    }

    public function Faqs ()
    {
        return $this->hasMany(Faq::class, 'event_id', 'id');
    }

    public function Errors ()
    {
        return $this->hasMany(EventError::class, 'event_id', 'id');
    }

    public function getAllowedDomainsAttribute ($value)
    {
        if(!is_null($value)){
            return json_decode($value);
        }
    }

    public function getAddressRequiredFieldsAttribute ($value)
    {
        if(!is_null($value)){
            return json_decode($value);
        }
    }

}
