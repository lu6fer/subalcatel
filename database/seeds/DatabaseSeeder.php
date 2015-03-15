<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 */
class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
//disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Labels
        $this->call('DiveLabelsTableSeeder');
        $this->call('NitroxLabelsTableSeeder');
        $this->call('MonitorLabelsTableSeeder');
        $this->call('BoatLabelsTableSeeder');
        $this->call('OrigineLabelsTableSeeder');
        $this->call('InsuranceLabelsTableSeeder');

        // Information
        $this->call('UsersTableSeeder');
        $this->call('AddressTableSeeder');
        $this->call('ArticlesTableSeeder');
        $this->call('CommentsTableSeeder');
        $this->call('DivesTableSeeder');
        $this->call('DiveLevelsTableSeeder');
        $this->call('NitroxLevelsTableSeeder');
        $this->call('MonitorLevelsTableSeeder');
        $this->call('BoatLicencesTableSeeder');
        $this->call('TivLicencesTableSeeder');
        $this->call('AdhesionsTableSeeder');
        $this->call('CertificateTableSeeder');

        // Pivot Tables
        $this->call('Dive_userTableSeeder');
        /*$this->call('Comment_userTableSeeder');
        $this->call('Article_userTableSeeder');*/
        /*$this->call('Article_commentTableSeeder');*/

        // Populate permission/roles tables
        //$this->call('PermissionsTableSeeder');

        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // $this->call('UserTableSeeder');
    }

}
