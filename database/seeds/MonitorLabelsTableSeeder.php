<?php
use Illuminate\Database\Seeder;

class MonitorLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'monitorLabels';

        DB::table($table)->truncate();

        $data = array(
            array('level' => 'E1'),
            array('level' => 'E2'),
            array('level' => 'E3'),
            array('level' => 'E4'),
        );

        DB::table($table)->insert($data);
    }

}