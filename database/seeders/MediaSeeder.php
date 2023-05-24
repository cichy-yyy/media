<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('pl_PL');
        $opiekun = ['Zbyszek', 'Krzysztof'];
        for ($i=0; $i < 10 ; $i++) {
            DB::table('media')->insert([
                'nazwa' => $faker->company,
                'region' => $faker->city,
                'miasto' => $faker->city,
                'ulica' => $faker->streetName.' '.$faker->buildingNumber,
                'kod' => $faker->postcode,
                'strona' => $faker->url,
                'telefon1' => $faker->phoneNumber,
                'telefon2' => $faker->phoneNumber,
                'info' => $faker->realTextBetween($minNbChars = 260, $maxNbChars = 400, $indexSize = 2),
                'email' => $faker->safeEmail,
                'email2' => $faker->safeEmail,
                'opiekun' => $opiekun[rand(0, 1)]
            ]);
        }
    }
}
