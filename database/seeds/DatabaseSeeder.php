<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProvinceSeeder::class);
        $this->call(RegionSeeder::class);
        
        //Comentar
        // $this->call(UserSeeder::class);
        // $this->call(CommerceSeeder::class);
        //------------
        
        $this->call(CharacteristicSeeder::class);
        
        //Comentar
        // $this->call(CharacteristicCommerceSeeder::class);
        //------------
        
        $this->call(PaymentSeeder::class);
        $this->call(CategorySeeder::class);
        
        //Comentar
        // $this->call(PaymentCommerceSeeder::class);
        // $this->call(BlogSeeder::class);        
        // $this->call(ProductSeeder::class);
        // $this->call(MessageSeeder::class);
        // $this->call(CommentSeeder::class);
        // $this->call(PictureSeeder::class);
        //------------
    }
}
