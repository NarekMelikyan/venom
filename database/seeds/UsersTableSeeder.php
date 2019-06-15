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
        \App\User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$j7zS664cfoCRFeuxJoc8t.TzRDZioyKYbZHrJJ7cL9XGewaaHdb2a'
        ]);
    }
}
