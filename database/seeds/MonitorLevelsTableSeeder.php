<?php
use Illuminate\Database\Seeder;

class MonitorLevelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'monitorLevels';

        DB::table($table)->truncate();

        $data = array(
            array('user_id' => '2',
                'monitor_label_id' => '1',
                'licence' => '123456',
                'instructor' => 'Henri Dupont',
                'origine' => 'Paris',
                'date' => '2000-08-02',
            ),
            array('user_id' => '2',
                'monitor_label_id' => '2',
                'licence' => '654321',
                'instructor' => 'Jean Valjean',
                'origine' => 'Clermont-ferrand',
                'date' => '2001-09-10',
            ),
        );

        DB::table($table)->insert($data);
    }

}