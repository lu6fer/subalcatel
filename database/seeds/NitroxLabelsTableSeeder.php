<?php
use Illuminate\Database\Seeder;

class NitroxLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'nitroxLabels';

        DB::table($table)->truncate();

        $data = array(
            array('level' => 'Nitrox'),
            array('level' => 'Nitrox confirme'),
            array('level' => 'Moniteur nitrox confirme'),
        );

        DB::table($table)->insert($data);
    }

}