<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo 'seeding roles...', PHP_EOL;

        Role::create(
            [
                'name' => 'SuperAdmin',
                'deletable' => false,
            ]
        );
        /*Role::create(
            [
                'name' => 'System Admin',
                'deletable' => false,
            ]
        );

        Role::create(
            [
                'name' => 'Partner',
                'deletable' => false,
            ]
        );*/

    }

}
