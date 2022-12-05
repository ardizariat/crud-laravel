<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            DB::table('customers')->insert([
                'name' => $faker->name,
                'nik' => $faker->randomNumber,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
                'created_at' => now()->toDateTimeString()
            ]);
        }
    }
}
