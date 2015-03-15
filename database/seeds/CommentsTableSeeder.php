<?php
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'comments';

        DB::table($table)->truncate();

        $data = array(
            array('content' => '1ere commentaire',
                'user_id' => '1'),
            array('content' => '2eme commentaire',
                'user_id' => '2'),
        );

        DB::table($table)->insert($data);
    }

}