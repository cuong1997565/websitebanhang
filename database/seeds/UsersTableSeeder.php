<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'     => 'admin',
                'email'    => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'level'    => 1
            ],
            [
                'name'     => 'vietpro',
                'email'    => 'vietpro@gmail.com',
                'password' => bcrypt('123456'),
                'level'    => 1
            ]
        ];
        DB::table('users')->insert($data);
    }
}
