<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table      = 'tbl_event';
    protected $primaryKey = 'id';

    public function commissarEvents()
    {
        return $this->hasMany('App\Model\CommissarEvent', 'event_id');
    }

    public function eventEquipments()
    {
        return $this->hasMany('App\Model\EventEquipment', 'event_id');
    }

    public function sportComplex()
    {
        return $this->belongsTo('App\Model\SportComplex', 'sport_complex_id');
    }
}
