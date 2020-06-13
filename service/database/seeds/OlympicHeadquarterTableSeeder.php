<?php

use App\Model\OlympicHeadquarter;
use Illuminate\Database\Seeder;

class OlympicHeadquarterTableSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_ENV', 'production') == 'local') {
            $this->fakeData();
        }
    }

    public function fakeData()
    {
        $this->setOlympicHeadquarter('Olimpiada 2020', 'Brasil', 120000, 2);
        $this->setOlympicHeadquarter('Olimpiada 2021', 'Japón', 178000, 1);
    }

    public function setOlympicHeadquarter(
        $name,
        $location,
        $budget,
        $numberOfComplexes
    )
    {
        $obj                      = new OlympicHeadquarter();
        $obj->name                = $name;
        $obj->location            = $location;
        $obj->number_of_complexes = $numberOfComplexes;
        $obj->budget              = $budget;
        $obj->save();
    }
}
