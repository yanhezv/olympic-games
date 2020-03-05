<?php

use App\Model\Area;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_ENV', 'production') == 'local') {
            $this->fakeData();
        }
    }

    public function fakeData()
    {
        $this->setArea('Pista del estadio', 'Estadio Principal');
        $this->setArea('Campo deportivo', 'Estadio Principal');
    }

    public function setArea($name, $location)
    {
        $obj            = new Area();
        $obj->area_name = $name;
        $obj->location  = $location;
        $obj->save();
    }
}
