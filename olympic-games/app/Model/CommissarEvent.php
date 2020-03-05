<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CommissarEvent extends Model
{
    const JUDGE_TASK    = '1';
    const OBSERVER_TASK = '2';

    protected $table      = 'tbl_commissar_event';
    protected $primaryKey = 'id';

    public function event()
    {
        return $this->belongsTo('App\Model\Event', 'event_id');
    }

    public function commissar()
    {
        return $this->belongsTo('App\Model\Commissar', 'commissar_id');
    }
}
