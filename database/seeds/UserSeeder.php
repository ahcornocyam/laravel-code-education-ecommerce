<?php

use Illuminate\Database\Seeder;
use CodeCommerce\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        /*factory('CodeCommerce\User',1)->create();*/

        User::create(
            [
                'name'      => 'maycon',
                'email'     => 'maycon.alex.rocha@hotmail.com',
                'password'  => Hash::make(123456),
                'is_admin'  => 1,
            ]);
    }
}
