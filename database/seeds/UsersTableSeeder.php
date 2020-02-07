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
        factory(App\User::class, 3)->create();

        // App\User::create([
        //     'name' => sprintf('%s', Str::random(4)),
        //     'email' => Str::random(5) . '@exam.com',
        //     'password' => bcrypt('1111'),
        // ]);
        
    }
}
