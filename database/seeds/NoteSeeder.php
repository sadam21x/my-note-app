<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');

        for ( $i = 1; $i <= 9; $i++ ){
            DB::table('notes')->insert([
                'id' => 'NOTE00000' . $i,
                'title' => $faker->realText(11),
                'content' => $faker->realText(200)
            ]);
        }
    }
}
