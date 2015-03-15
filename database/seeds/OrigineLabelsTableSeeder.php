<?php
use Illuminate\Database\Seeder;

class OrigineLabelsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'originLabels';

        DB::table($table)->truncate();

        $data = array(
            array('origin' => 'Actif Alcatel-Lucent'),
            array('origin' => 'Conjoint Actif Alcatel-Lucent'),
            array('origin' => 'Enfant Actif Alcatel-Lucent'),
            array('origin' => 'Preretraité Alcatel-Lucent'),
            array('origin' => 'Conjoint Preretraité Alcatel-Lucent'),
            array('origin' => 'Enfant Preretraité Alcatel-Lucent'),
            array('origin' => 'Entreprise partenaire CE Alcatel Lucent'),
            array('origin' => 'Extérieur'),
        );

        DB::table($table)->insert($data);
    }

}