<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DiveLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'diveLabels';

        DB::table($table)->truncate();

        $data = array(
            array(
                'level' => 'P0',
                'slug'  => 'p0'
            ),
            array(
                'level' => 'P1',
                'slug'  => 'p1'
            ),
            array(
                'level' => 'P2',
                'slug'  => 'p2'
            ),
            array(
                'level' => 'P3',
                'slug'  => 'p3'
            ),
            array(
                'level' => 'P4',
                'slug'  => 'p4'
            ),
        );

        DB::table($table)->insert($data);
    }

}