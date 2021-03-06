<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
	      $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call((UserSeeder::class));
        $this->call((OrderPaymentTypeSeeder::class));
        $this->call((OrderStatusSeeder::class));
    }
}
