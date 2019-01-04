<?php

use Illuminate\Database\Seeder;
use App\PostCategory;

class PostCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostCategory::create([
            'pc_title' => 'HTML',
            'pc_description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.',
            'pc_status' => 1
            
        ]);

        PostCategory::create([
            'pc_title' => 'CSS and Bootstrap',
            'pc_description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.',
            'pc_status' => 1
            
        ]);

        PostCategory::create([
            'pc_title' => 'Javascript',
            'pc_description' => 'Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. ',
            'pc_status' => 1
            
        ]);

        PostCategory::create([
            'pc_title' => 'Vue Js',
            'pc_description' => 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.',
            'pc_status' => 1
            
        ]);

        PostCategory::create([
            'pc_title' => 'PHP Laravel',
            'pc_description' => 'Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.',
            'pc_status' => 1
            
        ]);
    }
}
