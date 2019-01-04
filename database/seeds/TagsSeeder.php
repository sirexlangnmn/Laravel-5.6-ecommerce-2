<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
        	'tag' => 'Database Management',
        	'status' => 1,
        ]);

        Tag::create([
        	'tag' => 'Web Development',
        	'status' => 1,
        ]);

        Tag::create([
        	'tag' => 'System Analysis and Design',
        	'status' => 1,
        ]);

        Tag::create([
        	'tag' => 'Cyber Security and Ethical Hacking',
        	'status' => 1,
        ]);
        
        Tag::create([
        	'tag' => 'Capstone Project ',
        	'status' => 1,
        ]);

        
    }
}
