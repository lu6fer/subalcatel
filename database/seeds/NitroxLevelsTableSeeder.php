<?php
use Illuminate\Database\Seeder;

class NitroxLevelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'nitroxLevels';

        DB::table($table)->truncate();

        $data = array(
            array('user_id' => '2',
                'nitrox_label_id' => '1',
                'licence' => '123456',
                'instructor' => 'Richard Josse',
                'origine' => 'Subalcatel',
                'date' => '2010-05-21',
            ),
            array('user_id' => '2',
                'nitrox_label_id' => '2',
                'licence' => '654321',
                'instructor' => 'Philippe Cabon',
                'origine' => 'Subalcatel',
                'date' => '2011-10-10',
            ),
        );

        DB::table($table)->insert($data);
    }

}