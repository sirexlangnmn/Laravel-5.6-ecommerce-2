<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class DefaultUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Lorenz Ruizo',
            'email' => 'imlorenzruizo@gmail.com',
            'password' => Hash::make('thequickbrownfox'),
            'role_id' => 1,
            'status' => 0,
            /*'image' => '2018-10-12 01-50-15_3723.jpg',*/
            'slug' => 'john-lorenz-ruizo'
        ]);

        User::create([
            'name' => 'Federex Potolin',
            'email' => 'potolin.federex@gmail.com',
            'password' => Hash::make('federexpotolin'),
            'role_id' => 2,
            'status' => 1,
           /* 'image' => '2018-10-12 01-50-35_7974.PNG',*/
            'slug' => 'federex-potolin'
        ]);

        User::create([
            'name' => 'Daphne Zaballero',
            'email' => 'zaballero.daphne@gmail.com',
            'password' => Hash::make('zaballero.daphne'),
            'role_id' => 2,
            'status' => 0,
            /*'image' => '2018-10-12 01-52-15_1214.jpg',*/
            'slug' => 'daphne-zaballero'
        ]);

        User::create([
            'name' => 'Genevieve Olaguer',
            'email' => 'olaguer.genevieve@gmail.com',
            'password' => Hash::make('olaguer.genevieve'),
            'role_id' => 3,
            'status' => 0,
            /*'image' => '2018-10-12 01-52-57_10674.jpg',*/
            'slug' => 'genevieve-olaguer'
        ]);

        User::create([
            'name' => 'Customer One',
            'email' => 'customerone@gmail.com',
            'password' => Hash::make('customerone'),
            'role_id' => 3,
            'status' => 0,
            /*'image' => '2018-10-12 01-53-16_88200.jpg',*/
            'slug' => 'customer-one'
        ]);

        User::create([
            'name' => 'sirexlangnmn',
            'email' => 'sirexlangnmn@gmail.com',
            'password' => Hash::make('sirexlangnmn'),
            'role_id' =>5,
            'status' => 1,
            /*'image' => '2018-10-12 01-53-36_4033.PNG',*/
            'slug' => 'si-rex-lang-nmn'
        ]);

        User::create([
            'name' => 'codemaztah',
            'email' => 'codemaztah@gmail.com',
            'password' => Hash::make('codemaztah'),
            'role_id' =>4,
            'status' => 1,
            /*'image' => '2018-10-12 01-53-57_98213.PNG',*/
            'slug' => 'code-maztah'
        ]);


    }
}
