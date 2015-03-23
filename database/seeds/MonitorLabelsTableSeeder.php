<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MonitorLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'monitorLabels';

        DB::table($table)->truncate();

        $data = array(
            array(
                'level' => 'E1',
                'slug' => Str::slug('E1'),
            ),
            array(
                'level' => 'E2',
                'slug' => Str::slug('E2'),
            ),
            array(
                'level' => 'E3',
                'slug' => Str::slug('E3'),
            ),
            array(
                'level' => 'E4',
                'slug' => Str::slug('E4'),
            ),
        );

        DB::table($table)->insert($data);
    }

}