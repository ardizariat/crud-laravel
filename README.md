# Project Title

CRUD Laravel project

## Documentation

1. Clone project "git clone"
2. Kemudian masuk ke dalam project dengan command line lalu jalankan perintah "composer install"
3. Kemudian jalankan "composer update"
4. Lalu buat file didalam project CRUD Laravel, nama filenya ".env"
5. Kemudian copy paste semua script yang ada di .env.example lalu copas ke file .env
6. Kemudian jalankan perintah "php artisan key:generate" untuk generate key laravel di file .env
7. Lalu buat database baru sesuai kebutuhan dan masukan data credential database ke file .env, contoh nama databasenya "crud_laravel"
8. Lalu jalankan script "php artisan migrate:fresh --seed"
9. Lalu jalankan server laravel dengan perintah "php artisan serve"

## Membuat data seeder

1. Buka project dengan command line
2. Kemudian jalankan "php artisan make:migration create_customers_table" untuk perintah membuat table customer menggunakan script laravel
3. Lalu buat file seeder untuk membuat data acak dengan perintah "php artisan make:seeder CustomerSeeder"
4. Kemudian buka file database/migrations/2022_12_05_090516_create_customers_table.php
5. Lalu buat field untuk table customers, contoh
   Schema::table('customers', function (Blueprint $table) {
   $table->id();
   $table->string('name');
   $table->string('nik');
   $table->string('address');
   $table->string('phone');
   $table->timestamps();
   });
   masukkan script diatas didalam function up()
6. Setelah itu buka command line lalu jalankan script "php artisan migrate" untuk membuat table baru menggunakan script laravel
7. Kemudian buka file database/seeders/CustomerSeeder, lalu copy paste script ini

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 100; $i++) { //100 adalah jumlah row yg akan dibuat
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

8. Kemudian bukan file database/seeders/DatabaseSeeder.php
9. Didalam function run, copy paste script ini
$this->call(CustomerSeeder::class);
script diatas untuk memanggil class customer seeder untuk dijalankan
10. Lalu buka command line, jalankan script "php artisan db:seed"
11. Lalu cek database di table customers apakah data sudah bertambah atau belum.

untuk dokumentasi data fake bisa dilihat di https://github.com/fzaninotto/Faker
