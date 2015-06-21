<?php
use Illuminate\Database\Seeder;

class Dive_userTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'dive_user';

        DB::table($table)->truncate();

        $data = array(
            array(
                'dive_id' => '1',
                'user_id' => '2',
                'comment' => 'Remise a l\'eau',
                'drink'   => '0'
            ),
            array(
                'dive_id' => '1',
                'user_id' => '2',
                'comment' => 'Remise a l\'eau',
                'drink'   => '1'
            )
        );

        DB::table($table)->insert($data);
    }

}