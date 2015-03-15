<?php
use Illuminate\Database\Seeder;

class TivLicencesTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'tivLicences';

        DB::table($table)->truncate();

        $data = array(
            'user_id' => '1',
            'licence' => '987357159',
            'date' => '2004-05-10',
        );

        DB::table($table)->insert($data);
    }

}