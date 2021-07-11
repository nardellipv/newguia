<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->delete();

        $payments = [
            ['name'=>'Visa', 'photo'=>'styleWeb/assets/icons/payments/visa.png'],
            ['name'=>'MasterCard', 'photo'=>'styleWeb/assets/icons/payments/mastercard.png'],
            ['name'=>'AmericanExpress', 'photo'=>'styleWeb/assets/icons/payments/amex.png'],
            ['name'=>'AngenCard', 'photo'=>'styleWeb/assets/icons/payments/agencard.png'],
            ['name'=>'Cabal', 'photo'=>'styleWeb/assets/icons/payments/cabal.png'],
            ['name'=>'Maestro', 'photo'=>'styleWeb/assets/icons/payments/maestro.png'],
            ['name'=>'Diners Club', 'photo'=>'styleWeb/assets/icons/payments/diners.png'],
            ['name'=>'Mercado Pago', 'photo'=>'styleWeb/assets/icons/payments/mp.png'],
        ];

        foreach ($payments as $payment) {
            \App\Payment::create($payment);
        }
    }
}
