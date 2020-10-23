<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        User::truncate();

        $superadminRole = Role::create(['name' => 'Super-Administrador']);
        $adminRole = Role::create(['name' => 'Administrador']);
        $docenteRole = Role::create(['name' => 'Docente']);

        $user = new user;
        $user->name = 'Super Administrador';
        $user->email= 'superadmin@gmail.com';
        $user->password = bcrypt('superadmin');
        $user->username = 'superadmin';
        $user->estado = 1;
        $user->save();
        $user->assignRole($superadminRole);

        $user = new user;
        $user->name = 'Administrador';
        $user->email= 'admin@gmail.com';
        $user->password = bcrypt('admin');
        $user->username = 'admin';
        $user->estado = 1;
        $user->save();
        $user->assignRole($adminRole);

        $user = new user;
        $user->name = 'Docente';
        $user->email= 'docente@gmail.com';
        $user->password = bcrypt('docente');
        $user->username = 'docente';
        $user->estado = 1;
        $user->save();
        $user->assignRole($docenteRole);
    }
}
