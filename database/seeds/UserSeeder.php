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
                'fone'      => '(48)3333-3333',
                'cpf'       => '999.999.9999-99',
                'email'     => 'maycon.alex.rocha@hotmail.com',
                'password'  => Hash::make(123456),
                'is_admin'  => 1,
            ]);
    }
}
