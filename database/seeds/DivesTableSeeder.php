<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DivesTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'dives';
        $startDate = time();
        $date = date('Y-m-d H:i:s', strtotime('+1 month', $startDate));

        DB::table($table)->truncate();

        $data = array(
            array(
                'title' => '1ere plongée',
                'slug' => Str::slug('1ere plongée '.$date),
                'description' => 'Nouveau site, nouvelle plongées',
                'place' => 'Pors Kamor',
                'owner' => '1',
                'date' => $date,
                'ending' => $date,
            ),
            array(
                'title' => '2eme plongée',
                'slug' => Str::slug('2eme plongée '.$date),
                'description' => 'Nouveau site, nouvelle plongées',
                'place' => 'Squewel',
                'owner' => '1',
                'date' => $date,
                'ending' => $date,
            ),
        );

        DB::table($table)->insert($data);
    }

}