<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OlympicHeadquarter extends Model
{
    protected $table      = 'tbl_olympic_headquarter';
    protected $primaryKey = 'id';
    protected $fillable   = ['name', 'location', 'number_of_complexes', 'budget'];
    protected $hidden     = ['created_at', 'updated_at'];

    public function sportComplexs()
    {
        return $this->hasMany('App\Model\SportComplex', 'olympic_headquarter_id');
    }
}
