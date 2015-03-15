<?php
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{

    public function run()
    {
        $table = 'address';

        DB::table($table)->truncate();

        $data = array(
            array('user_id' => '1',
                'street' => 'Rue du systeme',
                'city' => 'Informatique',
                'zip' => '42000',
                'complement' => 'Deriere le clavier',
            ),
            array('user_id' => '2',
                'street' => 'Rue du kiddies',
                'city' => 'Userland',
                'zip' => '1001',
                'complement' => 'Dans le jardin',
            ),
        );

        DB::table($table)->insert($data);
    }

}