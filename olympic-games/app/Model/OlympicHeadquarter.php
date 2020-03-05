<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OlympicHeadquarter extends Model
{
    protected $table      = 'tbl_olympic_headquarter';
    protected $primaryKey = 'id';

    public function sportComplexs()
    {
        return $this->hasMany('App\Model\SportComplex', 'olympic_headquarter_id');
    }
}
