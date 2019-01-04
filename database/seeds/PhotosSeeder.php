<?php

use Illuminate\Database\Seeder;
use App\Photo;

class PhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::create([
            'photo_title' => '3456.jpg',
            'photo_status' => 1 
        ]);

        Photo::create([
            'photo_title' => '1234.jpg',
            'photo_status' => 1 
        ]);

        Photo::create([
            'photo_title' => '777.jpg',
            'photo_status' => 1 
        ]);

        Photo::create([
            'photo_title' => '888.jpg',
            'photo_status' => 1 
        ]);

        Photo::create([
            'photo_title' => '7878.jpg',
            'photo_status' => 1 
        ]);
    }
}
