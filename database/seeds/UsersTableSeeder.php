<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserRole;
use App\Http\Helpers\AppHelper;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo 'seeding users...', PHP_EOL;

        $user= User::create(
            [
                'name' => 'Mr. admin',
                'username' => 'admin',
                'email' => 'phpritesh@gmail.com',
                'password' => bcrypt('123456'),
                'remember_token' => null,
            ]
        );

       UserRole::create(
           [
               'user_id' => $user->id,
               'role_id' => AppHelper::USER_SUPERADMIN
           ]
       );

    }
}
