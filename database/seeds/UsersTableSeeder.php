<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::truncate();
      $user = [
        [
        'name' => 'The Southeren Rock',
        'email' => 'info@southerenrock.com',
        'password' => bcrypt('southerenrock@123456'),
        'role' => 'admin',
        ],

        [
        'name' => 'Web House Admin',
        'email' => 'info@tsr.com',
        'password' => bcrypt('secret@12345'),
        'role' => 'super_admin',
        ]


      ];

      User::insert($user);
    }
}
