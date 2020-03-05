<?php

use App\Model\UniqueSportComplex;
use Illuminate\Database\Seeder;

class UniqueSportComplexTableSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_ENV', 'production') == 'local') {
            $this->fakeData();
        }
    }

    public function fakeData()
    {
        $this->setUniqueSportComplex(2, 'Loza deportiva', 'Futsal', 'Complejo Javier Herau');
    }

    public function setUniqueSportComplex(
        $sportComplexId,
        $name,
        $sport,
        $location
    )
    {
        $obj                   = new UniqueSportComplex();
        $obj->area_name        = $name;
        $obj->location         = $location;
        $obj->sport            = $sport;
        $obj->sport_complex_id = $sportComplexId;
        $obj->save();
    }
}
