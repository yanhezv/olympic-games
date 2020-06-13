<?php

use App\Model\Equipment;
use Illuminate\Database\Seeder;

class EquipmentTableSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_ENV', 'production') == 'local') {
            $this->fakeData();
        }
    }

    public function fakeData()
    {
        $this->setEquipment('Arcos');
        $this->setEquipment('Pértigas');
        $this->setEquipment('Barras paralelas');
    }

    public function setEquipment($name)
    {
        $obj       = new Equipment();
        $obj->name = $name;
        $obj->save();
    }
}
