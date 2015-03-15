<?php
use Illuminate\Database\Seeder;

class InsuranceLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'insuranceLabels';

        DB::table($table)->truncate();

        $data = array(
            array('insurance' => 'Loisir 1'),
            array('insurance' => 'Loisir 1 Top'),
            array('insurance' => 'Loisir 2'),
            array('insurance' => 'Loisir 2 Top'),
            array('insurance' => 'Loisir 3'),
            array('insurance' => 'Loisir 3 Top'),
            array('insurance' => 'Non'),
        );

        DB::table($table)->insert($data);
    }

}