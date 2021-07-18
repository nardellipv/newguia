<?php

use Illuminate\Database\Seeder;

class PaymentCommerceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Payment_commerce::class, 20)->create();
    }
}
