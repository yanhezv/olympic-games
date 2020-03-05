<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table      = 'tbl_area';
    protected $primaryKey = 'id';

    public function sportsCenterComplexs()
    {
        return $this->hasMany('App\Model\SportsCenterComplex', 'area_id');
    }
}
