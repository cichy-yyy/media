<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use App\Models\journalist;
use App\Models\media;

class JournalistSeeder extends Seeder
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
            $journalist = journalist::create([
                'imie' => $faker->firstName,
                'nazwisko' => $faker->lastName,
                'stanowisko' => 'dziennikarz',
                'region' => $faker->city,
                'opiekun' => $opiekun[rand(0, 1)],
                'telefon1' => $faker->phoneNumber,
                'telefon2' => $faker->phoneNumber,
                'email1' => $faker->safeEmail,
                'email2' => $faker->safeEmail,
                'email3' => $faker->safeEmail,
                'info' => $faker->realTextBetween($minNbChars = 260, $maxNbChars = 400, $indexSize = 2)
            ]);

            $mediaId = media::pluck('id')->random(3)->toArray();
            $journalist->media()->attach($mediaId);
        }
    }
}
