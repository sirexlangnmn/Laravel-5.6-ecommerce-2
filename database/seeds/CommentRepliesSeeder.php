<?php

use Illuminate\Database\Seeder;
use App\CommentReply;

class CommentRepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CommentReply::create([
        	'comment_id' => 2,
        	'user_id' => 2,
        	'body' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
        	'status' => 1,
            'parent_id' => 0
        ]);

        CommentReply::create([
        	'comment_id' => 2,
        	'user_id' => 3,
        	'body' => 'Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim.',
        	'status' => 1,
            'parent_id' => 0
        ]);

        CommentReply::create([
        	'comment_id' => 2,
        	'user_id' => 4,
        	'body' => 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.',
        	'status' => 1,
            'parent_id' => 0
        ]);

        CommentReply::create([
            'comment_id' => 2,
            'user_id' => 2,
            'body' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
            'status' => 1,
            'parent_id' => 3
        ]);

        CommentReply::create([
            'comment_id' => 2,
            'user_id' => 3,
            'body' => 'Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim.',
            'status' => 1,
            'parent_id' => 3
        ]);

        CommentReply::create([
            'comment_id' => 2,
            'user_id' => 4,
            'body' => 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.',
            'status' => 1,
            'parent_id' => 5
        ]);

        CommentReply::create([
            'comment_id' => 1,
            'user_id' => 3,
            'body' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
            'status' => 1,
            'parent_id' => 0
        ]);

        CommentReply::create([
            'comment_id' => 6,
            'user_id' => 2,
            'body' => 'Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim.',
            'status' => 1,
            'parent_id' => 0
        ]);

        CommentReply::create([
            'comment_id' => 6,
            'user_id' => 3,
            'body' => 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.',
            'status' => 1,
            'parent_id' => 9
        ]);
    }
}
