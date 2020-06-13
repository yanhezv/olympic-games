<?php

use App\Model\Event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_ENV', 'production') == 'local') {
            $this->fakeData();
        }
    }

    public function fakeData()
    {
        $this->setEvent(1, 'Carrera de posta', 3);
        $this->setEvent(1, 'Carrera de obstáculos', 3);
        $this->setEvent(2, 'Futbol', 1);
    }

    public function setEvent(
        $sportComplexId,
        $name,
        $numberOfCommissioners,
        $duration = '2 dias',
        $numberOfParticipants = 25,
        $date = '2020-03-10 08:00:00'
    )
    {
        $obj                          = new Event();
        $obj->name                    = $name;
        $obj->date                    = $date;
        $obj->duration                = $duration;
        $obj->number_of_participants  = $numberOfParticipants;
        $obj->number_of_commissioners = $numberOfCommissioners;
        $obj->sport_complex_id        = $sportComplexId;
        $obj->save();
    }
}
