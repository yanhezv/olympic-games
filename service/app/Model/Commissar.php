<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Commissar extends Model
{
    protected $table      = 'tbl_commissar';
    protected $primaryKey = 'id';
    protected $fillable   = ['name'];
    protected $hidden     = ['created_at', 'updated_at'];

    public function commissarEvents()
    {
        return $this->hasMany('App\Model\CommissarEvent', 'commissar_id');
    }
}
