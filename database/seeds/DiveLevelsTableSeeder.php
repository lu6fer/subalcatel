<?php
use Illuminate\Database\Seeder;

class DiveLevelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'diveLevels';

        DB::table($table)->truncate();

        $data = array(
            array('user_id' => '2',
                'dive_label_id' => '1',
                'licence' => '123456',
                'instructor' => 'Richard Josse',
                'origine' => 'Subalcatel',
                'date' => '2000-08-02',
            ),
            array('user_id' => '2',
                'dive_label_id' => '2',
                'licence' => '654321',
                'instructor' => 'Mathieu Langlais',
                'origine' => 'Subalcatel',
                'date' => '2001-09-10',
            ),
        );

        DB::table($table)->insert($data);
    }

}