<?php

use App\Model\SportsCenterComplex;
use Illuminate\Database\Seeder;

class SportsCenterComplexTableSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_ENV', 'production') == 'local') {
            $this->fakeData();
        }
    }

    public function fakeData()
    {
        $this->setSportsCenterComplex(1, 1, 'Carrera de 200m', 'Centro');
        $this->setSportsCenterComplex(1, 2, 'Lanzamiento de jabalina', 'NE');
        $this->setSportsCenterComplex(1, 2, 'Futbol', 'Centro');
    }

    public function setSportsCenterComplex(
        $sportComplexId,
        $areaId,
        $sport,
        $zone
    )
    {
        $obj                   = new SportsCenterComplex();
        $obj->sport            = $sport;
        $obj->zone             = $zone;
        $obj->sport_complex_id = $sportComplexId;
        $obj->area_id          = $areaId;
        $obj->save();
    }
}
