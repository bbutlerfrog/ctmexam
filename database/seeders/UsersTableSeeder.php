<?php

namespace Database\Seeders;

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
        app('db')
        ->table('users')
            ->insert
                ([
                'email' => 'john@smith.com',
                'optin' => true,
                'firstname'=> 'John',
                'lastname' => 'Smith'
                ]);

        app('db')
        ->table('users')
        ->insert
        ([
            'email' => 'bob@smith.com',
            'optin' => true,
            'firstname' => 'Bob',
            'lastname' => 'Smith'
        ]);
    }
}
