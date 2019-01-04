<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'post_title' => 'Post Title One',
            'post_body' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.',
            'post_image' => '2018-10-12 02-04-31_73837.jpg',
            'post_status' => 1,
            'user_id' => 3,
            'post_category_id' => 3,
            'photo_id' => 1,
            'slug' => 'post-title-one'
        ]);

        Post::create([
            'post_title' => 'Post Title Two',
            'post_body' => 'Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.',
            'post_image' => '2018-10-12 02-07-59_65420.jpg',
            'post_status' => 1,
            'user_id' => 4,
            'post_category_id' => 4, 
            'photo_id' => 2,
            'slug' => 'post-title-two'
        ]);

        Post::create([
            'post_title' => 'Post Title Three',
            'post_body' => 'Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.',
            'post_image' => '2018-10-12 02-10-11_92276.jpg',
            'post_status' => 1,
            'user_id' => 5,
            'post_category_id' => 5,
            'photo_id' => 3,
            'slug' => 'post-title-three'
        ]);
    }
}
