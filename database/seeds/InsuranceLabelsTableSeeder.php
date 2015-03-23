<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InsuranceLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'insuranceLabels';

        DB::table($table)->truncate();

        $data = array(
            array(
                'insurance' => 'Loisir 1',
                'slug' => Str::slug('Loisir 1'),
            ),
            array(
                'insurance' => 'Loisir 1 Top',
                'slug' => Str::slug('Loisir 1 Top'),
            ),
            array(
                'insurance' => 'Loisir 2',
                'slug' => Str::slug('Loisir 2'),
            ),
            array(
                'insurance' => 'Loisir 2 Top',
                'slug' => Str::slug('Loisir 2 Top'),
            ),
            array(
                'insurance' => 'Loisir 3',
                'slug' => Str::slug('Loisir 3'),
            ),
            array(
                'insurance' => 'Loisir 3 Top',
                'slug' => Str::slug('Loisir 3 Top'),
            ),
            array(
                'insurance' => 'Non',
                'slug' => Str::slug('Non'),
            ),
        );

        DB::table($table)->insert($data);
    }

}