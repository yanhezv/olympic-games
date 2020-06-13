<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SportComplex extends Model
{
    const TYPE_UNIQUE_SPORT  = '1';
    const TYPE_SPORTS_CENTER = '2';

    protected $table      = 'tbl_sport_complex';
    protected $primaryKey = 'id';
    protected $fillable   = ['location', 'head_of_organization', 'total_area', 'complex_type', 'olympic_headquarter_id'];
    protected $hidden     = ['created_at', 'updated_at'];

    public function uniqueSportComplexs()
    {
        return $this->hasMany('App\Model\UniqueSportComplex', 'sport_complex_id');
    }

    public function sportsCenterComplexs()
    {
        return $this->hasMany('App\Model\SportsCenterComplex', 'sport_complex_id');
    }

    public function events()
    {
        return $this->hasMany('App\Model\Event', 'sport_complex_id');
    }

    public function olympicHeadquarter()
    {
        return $this->belongsTo('App\Model\OlympicHeadquarter', 'olympic_headquarter_id');
    }
}
