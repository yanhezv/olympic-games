<?php

use App\Model\CommissarEvent;
use Illuminate\Database\Seeder;

class CommissarEventTableSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_ENV', 'production') == 'local') {
            $this->fakeData();
        }
    }

    public function fakeData()
    {
        $this->setCommissarEvent(1, 1, CommissarEvent::JUDGE_TASK);
        $this->setCommissarEvent(1, 2, CommissarEvent::OBSERVER_TASK);
        $this->setCommissarEvent(1, 3, CommissarEvent::OBSERVER_TASK);
        $this->setCommissarEvent(2, 1, CommissarEvent::OBSERVER_TASK);
        $this->setCommissarEvent(2, 2, CommissarEvent::JUDGE_TASK);
        $this->setCommissarEvent(2, 3, CommissarEvent::OBSERVER_TASK);
        $this->setCommissarEvent(3, 1, CommissarEvent::OBSERVER_TASK);
        $this->setCommissarEvent(3, 2, CommissarEvent::OBSERVER_TASK);
        $this->setCommissarEvent(3, 3, CommissarEvent::JUDGE_TASK);
    }

    public function setCommissarEvent($commisarId, $eventId, $task)
    {
        $obj                = new CommissarEvent();
        $obj->commissar_id  = $commisarId;
        $obj->event_id      = $eventId;
        $obj->commisar_task = $task;
        $obj->save();
    }
}
