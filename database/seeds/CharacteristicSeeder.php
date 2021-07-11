<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CharacteristicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characteristics')->delete();

        $characteristics = [
            ['name'=>'Mesas al aire libre', 'photo'=>'styleWeb/assets/icons/characteristics/sun.png'],
            ['name'=>'Juegos para chicos', 'photo'=>'styleWeb/assets/icons/characteristics/children.png'],
            ['name'=>'Aire Acondicionado', 'photo'=>'styleWeb/assets/icons/characteristics/air-conditioner.png'],
            ['name'=>'Menú Ejecutivo', 'photo'=>'styleWeb/assets/icons/characteristics/dinner.png'],
            ['name'=>'Estacionamiento', 'photo'=>'styleWeb/assets/icons/characteristics/parking.png'],
            ['name'=>'Accesibilidad', 'photo'=>'styleWeb/assets/icons/characteristics/wheelchair.png'],
            ['name'=>'Wi-Fi', 'photo'=>'styleWeb/assets/icons/characteristics/wifi.png'],
            ['name'=>'Barra de Tragos', 'photo'=>'styleWeb/assets/icons/characteristics/cocktail.png'],
        ];

        foreach ($characteristics as $characteristic) {
            \App\Characteristic::create($characteristic);
        }
    }
}
