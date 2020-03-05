<?php

use App\Model\EventEquipment;
use Illuminate\Database\Seeder;

class EventEquipmentTableSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_ENV', 'production') == 'local') {
            $this->fakeData();
        }
    }

    public function fakeData()
    {
        $this->setEventEquipment(1,1);
        $this->setEventEquipment(1,2);
        $this->setEventEquipment(2,1);
        $this->setEventEquipment(2,3);
        $this->setEventEquipment(3,2);
    }

    public function setEventEquipment($eventId, $equipmentId)
    {
        $obj               = new EventEquipment();
        $obj->event_id     = $eventId;
        $obj->equipment_id = $equipmentId;
        $obj->save();
    }
}
