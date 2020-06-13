<?php

use App\Model\Commissar;
use Illuminate\Database\Seeder;

class CommissarTableSeeder extends Seeder
{
    public function run()
    {
        if (env('APP_ENV', 'production') == 'local') {
            $this->fakeData();
        }
    }

    public function fakeData()
    {
        $this->setCommissar('Omar Villanueva Sotelo');
        $this->setCommissar('Martina Vásquez');
        $this->setCommissar('Luis Olortegui');
    }

    public function setCommissar($name)
    {
        $obj       = new Commissar();
        $obj->name = $name;
        $obj->save();
    }
}
