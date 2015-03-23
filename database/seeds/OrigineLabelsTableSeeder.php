<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrigineLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'originLabels';

        DB::table($table)->truncate();

        $data = array(
            array(
                'origin' => 'Actif Alcatel-Lucent',
                'slug' => Str::slug('Actif Alcatel-Lucent'),
            ),
            array(
                'origin' => 'Conjoint Actif Alcatel-Lucent',
                'slug' => Str::slug('Conjoint Actif Alcatel-Lucent'),
            ),
            array(
                'origin' => 'Enfant Actif Alcatel-Lucent',
                'slug' => Str::slug('Enfant Actif Alcatel-Lucent'),
            ),
            array(
                'origin' => 'Preretraité Alcatel-Lucent',
                'slug' => Str::slug('Preretraité Alcatel-Lucent'),
            ),
            array(
                'origin' => 'Conjoint Preretraité Alcatel-Lucent',
                'slug' => Str::slug('Conjoint Preretraité Alcatel-Lucent'),
            ),
            array(
                'origin' => 'Enfant Preretraité Alcatel-Lucent',
                'slug' => Str::slug('Enfant Preretraité Alcatel-Lucent'),
            ),
            array(
                'origin' => 'Entreprise partenaire CE Alcatel Lucent',
                'slug' => Str::slug('Entreprise partenaire CE Alcatel Lucent'),
            ),
            array(
                'origin' => 'Extérieur',
                'slug' => Str::slug('Extérieur'),
            ),
        );

        DB::table($table)->insert($data);
    }

}