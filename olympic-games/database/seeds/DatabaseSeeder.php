<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(OlympicHeadquarterTableSeeder::class);
        $this->call(SportComplexTableSeeder::class);
        $this->call(UniqueSportComplexTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(SportsCenterComplexTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(CommissarTableSeeder::class);
        $this->call(CommissarEventTableSeeder::class);
        $this->call(EquipmentTableSeeder::class);
        $this->call(EventEquipmentTableSeeder::class);
    }
}
