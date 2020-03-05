<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table      = 'tbl_equipment';
    protected $primaryKey = 'id';

    public function eventEquipments()
    {
        return $this->hasMany('App\Model\EventEquipment', 'equipment_id');
    }
}
