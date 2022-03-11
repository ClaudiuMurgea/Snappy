<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    use HasFactory;

    protected $fillable = [];

    public function Event ()
    {
        return $this->belongsTo(Event::class,'event_id','id');
    }

    public function SettingDetail ()
    {
        return $this->hasOne(SettingDetail::class,'id', 'setting_details_id',);
    }

    public function SettingTrackingDetail ()
    {
        return $this->hasOne(SettingTrackingDetail::class, 'id', 'setting_tracking_details_id');
    }

}
