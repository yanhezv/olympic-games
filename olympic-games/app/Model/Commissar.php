<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Commissar extends Model
{
    protected $table      = 'tbl_commissar';
    protected $primaryKey = 'id';

    public function commissarEvents()
    {
        return $this->hasMany('App\Model\CommissarEvent', 'commissar_id');
    }
}
