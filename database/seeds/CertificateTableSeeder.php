<?php
use Illuminate\Database\Seeder;

class CertificateTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'certificate';

        DB::table($table)->truncate();

        $data = array(
            'user_id' => '1',
            'image' => 'cert.jpg',
            'validity' => '2015-04-12',
        );

        DB::table($table)->insert($data);
    }

}