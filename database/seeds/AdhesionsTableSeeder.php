<?php
use Illuminate\Database\Seeder;

class AdhesionsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'adhesions';

        DB::table($table)->truncate();

        $data = array(
            'user_id' => '1',
            'licence' => '369-POI-7Az8',
            'asac' => '123654',
            'date' => '2014-04-23',
            'origin_label_id' => '1',
            'magazine' => '0',
            'tank' => '1',
            'regulator' => '0',
            'supervisor' => '0',
            'lannionPool' => '0',
            'freePool' => '0',
            'trestelPool' => '0',
            'access' => '1',
            'insurance_label_id' => '1',
        );

        DB::table($table)->insert($data);
    }

}