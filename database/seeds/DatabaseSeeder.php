<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            DefaultUsersSeeder::class,
            UserProfilesSeeder::class,
            DefaultRolesSeeder::class,
            OrdersSeeder::class,
            OrderItemsSeeder::class,
            ProductsSeeder::class,
            PostsSeeder::class,
            PhotosSeeder::class,
            PostCategoriesSeeder::class,
            TagsSeeder::class,
            CommentsSeeder::class,
            CommentRepliesSeeder::class
        ]);
    }
}
