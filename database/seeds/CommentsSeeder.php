<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
        	'post_id' => 2,
        	'user_id' => 2,
        	'body' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
        	'status' => 1
        ]);

        Comment::create([
        	'post_id' => 2,
        	'user_id' => 2,
        	'body' => 'Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim.',
        	'status' => 1
        ]);

        Comment::create([
        	'post_id' => 2,
        	'user_id' => 2,
        	'body' => 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.',
        	'status' => 1
        ]);

        Comment::create([
            'post_id' => 2,
            'user_id' => 3,
            'body' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
            'status' => 1
        ]);

        Comment::create([
            'post_id' => 2,
            'user_id' => 3,
            'body' => 'Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim.',
            'status' => 1
        ]);

        Comment::create([
            'post_id' => 1,
            'user_id' => 3,
            'body' => 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.',
            'status' => 1
        ]);

        Comment::create([
            'post_id' => 1,
            'user_id' => 3,
            'body' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
            'status' => 1
        ]);


    }
}
