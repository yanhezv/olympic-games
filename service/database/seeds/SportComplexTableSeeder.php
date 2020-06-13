<?php

use App\Model\SportComplex;
use Illuminate\Database\Seeder;

class SportComplexTableSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_ENV', 'production') == 'local') {
            $this->fakeData();
        }
    }

    public function fakeData()
    {
        $this->setSportComplex(1, SportComplex::TYPE_SPORTS_CENTER, 'Rio de Janeiro', 'Luis Santos', 12000);
        $this->setSportComplex(1, SportComplex::TYPE_UNIQUE_SPORT, 'Brasilia', 'Older Mask', 15370);
    }

    public function setSportComplex(
        $olympicHeadquarterId,
        $complexType,
        $location,
        $headOfOrganization,
        $totalArea
    )
    {
        $obj                         = new SportComplex();
        $obj->location               = $location;
        $obj->head_of_organization   = $headOfOrganization;
        $obj->total_area             = $totalArea;
        $obj->complex_type           = $complexType;
        $obj->olympic_headquarter_id = $olympicHeadquarterId;
        $obj->save();
    }
}
