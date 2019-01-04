<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'product_name' => 'Cotton T-Shirt',
            'product_code' => 'cts-rw-150',
            'product_price' => 777,
            'product_description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.',
            'product_status' => 1,
            'product_image' => '50713.png'
            
        ]);

        Product::create([
            'product_name' => 'Cotton Blouse',
            'product_code' => 'cb-pi-180',
            'product_price' => 888,
            'product_description' => 'Aenean massa. Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
            'product_status' => 1,
            'product_image' => '27945.png'
            
        ]);

        Product::create([
            'product_name' => 'Washing Machine',
            'product_code' => 'wm-12345',
            'product_price' => 1212,
            'product_description' => 'Nnatoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
            'product_status' => 1,
            'product_image' => '49899.jpg'
            
        ]);

        Product::create([
            'product_name' => 'Computer Set',
            'product_code' => 'comset-25000',
            'product_price' => 25000,
            'product_description' => 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.',
            'product_status' => 1,
            'product_image' => '87502.jpg'
            
        ]);

        Product::create([
            'product_name' => 'TV',
            'product_code' => 'htv-bla-45000',
            'product_price' => 55000,
            'product_description' => 'Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.',
            'product_status' => 1,
            'product_image' => '12923.jpg'
            
        ]);
    }
}
