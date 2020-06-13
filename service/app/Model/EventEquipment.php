<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EventEquipment extends Model
{
    protected $table      = 'tbl_event_equipment';
    protected $primaryKey = 'id';
    protected $fillable   = ['event_id', 'equipment_id'];
    protected $hidden     = ['created_at', 'updated_at'];

    public function event()
    {
        return $this->belongsTo('App\Model\Event', 'event_id');
    }

    public function equipment()
    {
        return $this->belongsTo('App\Model\Equipment', 'equiment_id');
    }
}
