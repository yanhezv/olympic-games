<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table      = 'tbl_area';
    protected $primaryKey = 'id';
    protected $fillable   = ['area_name', 'location'];
    protected $hidden     = ['created_at', 'updated_at'];

    public function sportsCenterComplexs()
    {
        return $this->hasMany('App\Model\SportsCenterComplex', 'area_id');
    }
}
