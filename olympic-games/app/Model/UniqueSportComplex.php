<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UniqueSportComplex extends Model
{
    protected $table      = 'tbl_unique_sport_complex';
    protected $primaryKey = 'id';

    public function sportComplex()
    {
        return $this->belongsTo('App\Model\SportComplex', 'sport_complex_id');
    }
}
