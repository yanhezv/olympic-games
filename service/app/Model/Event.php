<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table      = 'tbl_event';
    protected $primaryKey = 'id';
    protected $fillable   = ['name', 'date', 'duration', 'number_of_participants', 'number_of_commissioners', 'sport_complex_id'];
    protected $hidden     = ['created_at', 'updated_at'];
    protected $casts      = ['date' => 'datetime:Y-m-d'];

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
