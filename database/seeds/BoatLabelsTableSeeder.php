<?php
use Illuminate\Database\Seeder;

class BoatLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'boatLabels';

        DB::table($table)->truncate();

        $data = array(
            array('level' => 'Permis mer cotier'),
            array('level' => 'Permis mer hauturier'),
        );

        DB::table($table)->insert($data);
    }

}