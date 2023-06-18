<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('images')->insert([
            [
                "title" => "Deneme görsel 1",
                "image" => "deneme görsel"

            ],
            [
                "title" => "Deneme görsel 2",
                "image" => "deneme görsel 2"
            ],
            [  "title" => "Deneme görsel 3",
                "image" => "deneme görsel 3"
            ],
            [
                "title" => "Deneme görsel 4",
                "image" => "deneme görsel 4"
            ]
        ]);
    }
}
