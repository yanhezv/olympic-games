<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UniqueSportComplex extends Model
{
    protected $table      = 'tbl_unique_sport_complex';
    protected $primaryKey = 'id';
    protected $fillable   = ['area_name', 'location', 'sport', 'sport_complex_id'];
    protected $hidden     = ['created_at', 'updated_at'];

    public function sportComplex()
    {
        return $this->belongsTo('App\Model\SportComplex', 'sport_complex_id');
    }
}
