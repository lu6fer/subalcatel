<?php

use Illuminate\Database\Seeder;

class DiveLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'diveLabels';

        DB::table($table)->truncate();

        $data = array(
            array('level' => 'P0'),
            array('level' => 'P1'),
            array('level' => 'P2'),
            array('level' => 'P3'),
            array('level' => 'P4'),
        );

        DB::table($table)->insert($data);
    }

}