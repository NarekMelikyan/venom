<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Languages::create([
            'name' => 'English',
            'lang' => 'en'
        ]);

        \App\Languages::create([
            'name' => 'Russian',
            'lang' => 'ru'
        ]);

        \App\Languages::create([
            'name' => 'Armenian',
            'lang' => 'hy'
        ]);
    }
}
