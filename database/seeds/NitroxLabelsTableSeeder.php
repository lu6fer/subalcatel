<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NitroxLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'nitroxLabels';

        DB::table($table)->truncate();

        $data = array(
            array(
                'level' => 'Nitrox',
                'slug' => Str::slug('Nitrox'),
            ),
            array(
                'level' => 'Nitrox confirmé',
                'slug' => Str::slug('Nitrox confirmé'),
            ),
            array(
                'level' => 'Moniteur nitrox confirmé',
                'slug' => Str::slug('Moniteur nitrox confirmé'),
            ),
        );

        DB::table($table)->insert($data);
    }

}