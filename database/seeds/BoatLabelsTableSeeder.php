<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BoatLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'boatLabels';

        DB::table($table)->truncate();

        $data = array(
            array(
                'level' => 'Permis mer cotier',
                'slug' => Str::slug('Permis mer cotier'),
            ),
            array(
                'level' => 'Permis mer hauturier',
                'slug' => Str::slug('Permis mer hauturier'),
            ),
        );

        DB::table($table)->insert($data);
    }

}