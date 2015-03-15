<?php
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'articles';
        $startDate = time();
        $date = date('Y-m-d H:i:s', strtotime('-1 day', $startDate));

        DB::table($table)->truncate();

        $data = array(
            array('title' => '1ere article',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt porta luctus. Nullam auctor malesuada orci nec consequat. Mauris semper consequat turpis, vel elementum ante dictum nec. Proin vel sem quis est interdum vehicula. Nullam nec dignissim lectus, id sagittis massa. Etiam ante lorem, volutpat ac ligula vitae, hendrerit vehicula sem. Quisque eget est at nulla tincidunt adipiscing. Cras suscipit ante a neque ultricies semper vel a nulla. Cras molestie, nisi ac tincidunt tincidunt, tellus magna consectetur arcu, molestie tempor magna leo eget metus.',
                'user_id' => '1',
                'created_at' => $date,
                'updated_at' => $date
            ),
            array('title' => '2eme article',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt porta luctus. Nullam auctor malesuada orci nec consequat. Mauris semper consequat turpis, vel elementum ante dictum nec. Proin vel sem quis est interdum vehicula. Nullam nec dignissim lectus, id sagittis massa. Etiam ante lorem, volutpat ac ligula vitae, hendrerit vehicula sem. Quisque eget est at nulla tincidunt adipiscing. Cras suscipit ante a neque ultricies semper vel a nulla. Cras molestie, nisi ac tincidunt tincidunt, tellus magna consectetur arcu, molestie tempor magna leo eget metus.',
                'user_id' => '1',
                'created_at' => $date,
                'updated_at' => $date
            ),
            array('title' => '3eme article',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt porta luctus. Nullam auctor malesuada orci nec consequat. Mauris semper consequat turpis, vel elementum ante dictum nec. Proin vel sem quis est interdum vehicula. Nullam nec dignissim lectus, id sagittis massa. Etiam ante lorem, volutpat ac ligula vitae, hendrerit vehicula sem. Quisque eget est at nulla tincidunt adipiscing. Cras suscipit ante a neque ultricies semper vel a nulla. Cras molestie, nisi ac tincidunt tincidunt, tellus magna consectetur arcu, molestie tempor magna leo eget metus.',
                'user_id' => '1',
                'created_at' => $date,
                'updated_at' => $date
            ),
        );

        DB::table($table)->insert($data);
    }

}