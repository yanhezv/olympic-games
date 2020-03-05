<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table      = 'tbl_equipment';
    protected $primaryKey = 'id';
    protected $fillable   = ['name'];
    protected $hidden     = ['created_at', 'updated_at'];

    public function eventEquipments()
    {
        return $this->hasMany('App\Model\EventEquipment', 'equipment_id');
    }
}
