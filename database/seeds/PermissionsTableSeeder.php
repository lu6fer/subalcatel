<?php
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

// Composer: "fzaninotto/faker": "v1.3.0"

class PermissionsTableSeeder extends Seeder
{

    public function run()
    {
        /**
         * All permissions
         * @var Permission
         */
        $articles_write = new Permission;
        $articles_write->name = 'articles_write';
        $articles_write->display_name = 'Ecrire un article';
        $articles_write->save();

        $articles_edit = new Permission;
        $articles_edit->name = 'articles_edit';
        $articles_edit->display_name = 'Modifier un article';
        $articles_edit->save();

        $articles_delete = new Permission;
        $articles_delete->name = 'articles_delete';
        $articles_delete->display_name = 'Supprimer un article';
        $articles_delete->save();

        $dives_create = new Permission;
        $dives_create->name = 'dives_create';
        $dives_create->display_name = 'Creer une sortie';
        $dives_create->save();

        $dives_edit = new Permission;
        $dives_edit->name = 'dives_edit';
        $dives_edit->display_name = 'Editer une sortie';
        $dives_edit->save();

        $dives_delete = new Permission;
        $dives_delete->name = 'dives_delete';
        $dives_delete->display_name = 'Supprimer une sortie';
        $dives_delete->save();

        $users_create = new Permission;
        $users_create->name = 'users_create';
        $users_create->display_name = 'Creer un utilisateur';
        $users_create->save();

        $users_edit = new Permission;
        $users_edit->name = 'users_edit';
        $users_edit->display_name = 'Editer un utilisateur';
        $users_edit->save();

        $users_delete = new Permission;
        $users_delete->name = 'users_delete';
        $users_delete->display_name = 'Supprimer un utilisateur';
        $users_delete->save();

        $usersLevels_create = new Permission;
        $usersLevels_create->name = 'usersLevels_create';
        $usersLevels_create->display_name = 'Ajouter un niveau a un utilisateur';
        $usersLevels_create->save();

        $usersLevels_edit = new Permission;
        $usersLevels_edit->name = 'usersLevels_edit';
        $usersLevels_edit->display_name = 'Modifier le niveau d\'un utilisateur';
        $usersLevels_edit->save();

        $usersLevels_delete = new Permission;
        $usersLevels_delete->name = 'usersLevels_delete';
        $usersLevels_delete->display_name = 'Supprimer un utilisateur';
        $usersLevels_delete->save();

        $adhesion_create = new Permission;
        $adhesion_create->name = 'adhesion_create';
        $adhesion_create->display_name = 'Creer une nouvelle adhesion';
        $adhesion_create->save();

        $adhesion_edit = new Permission;
        $adhesion_edit->name = 'adhesion_edit';
        $adhesion_edit->display_name = 'Modifier une adhesion';
        $adhesion_edit->save();

        $adhesion_delete = new Permission;
        $adhesion_delete->name = 'adhesion_delete';
        $adhesion_delete->display_name = 'Supprimer une adhesion';
        $adhesion_delete->save();

        /**
         * admin role permissions
         * @var array
         */
        $adminPerms = array(
            $adhesion_delete->id,
            $adhesion_edit->id,
            $adhesion_create->id,
            $usersLevels_delete->id,
            $usersLevels_edit->id,
            $usersLevels_create->id,
            $users_delete->id,
            $users_edit->id,
            $users_create->id,
            $dives_create->id,
            $dives_delete->id,
            $dives_edit->id,
            $articles_delete->id,
            $articles_edit->id,
            $articles_write->id
        );

        $admin = new Role;
        $admin->name = 'Admin';
        $admin->save();
        $admin->perms()->sync($adminPerms);

        $user = User::find(1)->first();
        $user->attachRole($admin);

        /**
         * Editor role permissions
         * @var array
         */
        $editorPerms = array(
            $articles_delete->id,
            $articles_edit->id,
            $articles_write->id
        );

        $editor = new Role;
        $editor->name = 'Editor';
        $editor->save();
        $editor->perms()->sync($editorPerms);

        // Attach user admin.istrator to editor role
        $user = User::find(1);
        $user->attachRole($editor);
        $user2 = User::find(2);
        $user2->attachRole($editor);

        /**
         * Diving director role permissions
         * @var array
         */
        $dpPerms = array(
            $dives_delete->id,
            $dives_edit->id,
            $dives_create->id
        );

        $DP = new Role;
        $DP->name = 'DP';
        $DP->save();
        $DP->perms()->sync($dpPerms);

        // Attach user us.er to DP role
        $user = User::find(2);
        $user->attachRole($DP);

    }

}