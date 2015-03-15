<?php
use Illuminate\Database\Seeder;

class BoatLicencesTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'boatLicences';

        DB::table($table)->truncate();

        $data = array(
            'user_id' => '2',
            'boat_label_id' => '1',
            'licence' => 'ADF-ERT-147',
            'instructor' => 'Herve Durant',
            'origine' => 'APPPG',
            'date' => '1980-06-07',
        );

        DB::table($table)->insert($data);
    }

}