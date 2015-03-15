<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'users';

        DB::table($table)->truncate();

        $data = array(
            array('name' => 'Istrator',
                'firstname' => 'Admin',
                'slug' => Str::slug('Admin Istrator'),
                'email' => 'admin.istrator@test.com',
                'phone' => '0123456789',
                'proPhone' => '0123456789',
                'mobPhone' => '0123456789',
                'birthday' => '1970-01-01',
                'birthcity' => 'admincity',
                'birthzip' => '42',
                'password' => Hash::make('admin')
            ),
            array('name' => 'Er',
                'firstname' => 'Us',
                'slug' => Str::slug('Us er'),
                'email' => 'Us.er@test.com',
                'phone' => '0123456789',
                'proPhone' => '0123456789',
                'mobPhone' => '0123456789',
                'birthday' => '1970-01-01',
                'birthcity' => 'userland',
                'birthzip' => '24',
                'password' => Hash::make('user')
            ),
        );

        DB::table($table)->insert($data);
    }

}