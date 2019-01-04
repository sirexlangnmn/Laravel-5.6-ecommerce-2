<?php

use Illuminate\Database\Seeder;
use App\UserProfile;

class UserProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        UserProfile::create([
            'user_id' => 1,
            'avatar' => '2018-10-12 01-50-15_3723.jpg',
            'contact' => '0909 1111 111',
            'about' => 'Aenean massa. Cusociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
        ]);

        UserProfile::create([
            'user_id' => 2,
            'avatar' => '2018-10-12 01-50-35_7974.PNG',
            'contact' => '0909 820 2040',
            'about' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.',
        ]);

        UserProfile::create([
            'user_id' => 3,
            'avatar' => '2018-10-12 01-52-15_1214.jpg',
            'contact' => '0909 777 8888',
            'about' => 'Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
        ]);

        UserProfile::create([
            'user_id' => 4,
            'avatar' => '2018-10-12 01-52-57_10674.jpg',
            'contact' => '0909 2222 222',
            'about' => 'Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.',
        ]);

        UserProfile::create([
            'user_id' => 5,
            'avatar' => '2018-10-12 01-53-16_88200.jpg',
            'contact' => '0909 7777 777',
            'about' => 'Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.',
        ]);

        UserProfile::create([
            'user_id' => 6,
            'avatar' => '2018-10-12 01-53-36_4033.PNG',
            'contact' => '0909 8888 888',
            'about' => 'In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.',
        ]);

        UserProfile::create([
            'user_id' => 7,
            'avatar' => '2018-10-12 01-53-57_98213.PNG',
            'contact' => '0909 8888 887',
            'about' => 'Nullam dictum felis eu pede mollis pretium.',
        ]);
    }
}
