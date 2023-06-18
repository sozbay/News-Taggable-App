<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('videos')->insert([
            [
                "title" => "Deneme video 1",
                "video" => "deneme"

            ],
            [
                "title" => "Deneme 2",
                "video" => "deneme 2"
            ],
            [  "title" => "Deneme 3",
                "video" => "deneme 3"
            ],
            [
                "title" => "Deneme 4",
                "video" => "deneme 4"
            ]
        ]);
    }
}
