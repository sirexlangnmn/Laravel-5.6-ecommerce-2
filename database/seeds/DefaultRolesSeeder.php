<?php

use Illuminate\Database\Seeder;
use App\Role;

class DefaultRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_title' => 'Super-Admin',
            'role_description' => 'Who ever has this role, shall be the god of roles. Has all the previlage on this app that has to offer. No one defies a super-admin.'
            
        ]);

        Role::create([
            'role_title' => 'Admin',
            'role_description' => 'Ruler of all. Well, Except the god or roles of course (super-admin). Can do every thing like super-admin does. Except adding new admin.'
            
        ]);

        Role::create([
            'role_title' => 'Customer',
            'role_description' => 'Master of the business. All person that can bring money to the company.'
            
        ]);

        Role::create([
            'role_title' => 'Staff',
            'role_description' => 'More on monitoring of admin side. Privilege to read only data'
            
        ]);

        Role::create([
            'role_title' => 'Software Engineer',
            'role_description' => 'The lowest creatures in the Earth'
            
        ]);


    }
}
