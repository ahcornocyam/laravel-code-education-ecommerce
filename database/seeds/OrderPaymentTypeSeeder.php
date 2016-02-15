<?php

use Illuminate\Database\Seeder;

class OrderPaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('order_paymenttypes')->truncate();
        \CodeCommerce\OrderPaymenttype::create([
            'id' => 1,
            'name' => "Cartão de crédito",
        ]);
        \CodeCommerce\OrderPaymenttype::create([
            'id' => 2,
            'name' => "Boleto",
        ]);
        \CodeCommerce\OrderPaymenttype::create([
            'id' => 3,
            'name' => "Débito online (TEF)",
        ]);
        \CodeCommerce\OrderPaymenttype::create([
            'id' => 4,
            'name' => "Saldo PagSeguro",
        ]);
        \CodeCommerce\OrderPaymenttype::create([
            'id' => 5,
            'name' => "Oi Paggo",
        ]);
        \CodeCommerce\OrderPaymenttype::create([
            'id' => 7,
            'name' => "Depósito em conta",
        ]);
    }
}
