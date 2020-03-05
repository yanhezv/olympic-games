<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SportsCenterComplex extends Model
{
    protected $table      = 'tbl_sports_center_complex';
    protected $primaryKey = 'id';

    public function sportComplex()
    {
        return $this->belongsTo('App\Model\SportComplex', 'sport_complex_id');
    }

    public function area()
    {
        return $this->belongsTo('App\Model\Area', 'area_id');
    }
}
