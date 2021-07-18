<?php

use Illuminate\Database\Seeder;

class CharacteristicCommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Characteristic_commerce::class, 20)->create();
    }
}
