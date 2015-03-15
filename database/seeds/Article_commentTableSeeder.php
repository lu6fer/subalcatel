<?php
use Illuminate\Database\Seeder;

class Article_commentTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'article_comment';

        DB::table($table)->truncate();

        $data = array(
            array(
                'comment_id' => '1',
                'article_id' => '1',
            ),
            array(
                'comment_id' => '2',
                'article_id' => '1'
            )
        );

        DB::table($table)->insert($data);
    }

}