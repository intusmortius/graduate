<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class StartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::updateOrCreate([
            "name" => "admin",
            "surname" => "",
            "fathername" => "",
            "faculty" => "NULL",
            "specialty" => "NULL",
            "cathedra" => "NULL",
            "group" => "NULL",
            "workplace" => "PSTU",
            "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            "email" => 'admin@gmail.com',
            "email_verified_at" => now(),
            "created_at" => now(),
        ]);
        $admin = Role::updateOrCreate(["name" => "admin", "slug" => "admin"]);
        $mod = Role::updateOrCreate(["name" => "moderator", "slug" => "moderator"]);
        $user = Role::updateOrCreate(["name" => "user", "slug" => "user"]);

        $up = Permission::updateOrCreate(["name" => "update-profile", "slug" => "update-profile"]);
        $up = Permission::updateOrCreate(["name" => "delete-profile", "slug" => "delete-profile"]);

        $admin->assignPermission("update-profile", "delete-profile");
        $mod->assignPermission("update-profile", "delete-profile");


        $super_admin->assignRole("admin", "moderator", "user");
    }
}
