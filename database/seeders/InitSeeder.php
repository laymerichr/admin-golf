<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Lista de permisos

        Permission::where('name', 'user')->delete();
        Permission::updateOrCreate(['name' => 'admin']);
        Permission::updateOrCreate(['name' => 'club']);
        Permission::updateOrCreate(['name' => 'escuelas']);
        Permission::updateOrCreate(['name' => 'federacion']);
        Permission::updateOrCreate(['name' => 'territoriales']);

        //Lista de roles
        $admin = Role::updateOrCreate(['name' => 'admin']);
        $club = Role::updateOrCreate(['name' => 'club']);
        $escuelas = Role::updateOrCreate(['name' => 'escuelas']);
        $federacion = Role::updateOrCreate(['name' => 'federacion']);
        $territoriales = Role::updateOrCreate(['name' => 'territoriales']);

        Role::where('name','user')->delete();

        $admin->givePermissionTo(
            [
                'admin',
            ]
        );
        $club->givePermissionTo(
            [
                'club',
            ]
        );
        $escuelas->givePermissionTo(
            [
                'escuelas',
            ]
        );
        $federacion->givePermissionTo(
            [
                'federacion',
            ]
        );
        $territoriales->givePermissionTo(
            [
                'territoriales',
            ]
        );

        User::truncate();
        $superAdminUser= User::updateOrCreate([
            'name' => 'ADMIN GOLF',
            'email' => 'admin@golf.es',
            'password' => Hash::make('Secretos'),
            'Bloqueado'=>false,
            'Activo'=>true
        ]);

        $clubUser= User::updateOrCreate([
            'name' => 'Club',
            'email' => 'club@golf.es',
            'password' => Hash::make('Secretos'),
            'Bloqueado'=>false,
            'Activo'=>true
        ]);

        $escuelaUser= User::updateOrCreate([
            'name' => 'Escuela',
            'email' => 'escuela@golf.es',
            'password' => Hash::make('Secretos'),
            'Bloqueado'=>false,
            'Activo'=>true
        ]);

        $federacionUser= User::updateOrCreate([
            'name' => 'Federacion',
            'email' => 'federacion@golf.es',
            'password' => Hash::make('Secretos'),
            'Bloqueado'=>false,
            'Activo'=>true
        ]);

        $territorialesUser= User::updateOrCreate([
            'name' => 'Territoriales',
            'email' => 'territoriales@golf.es',
            'password' => Hash::make('Secretos'),
            'Bloqueado'=>false,
            'Activo'=>true
        ]);

        $superAdminUser->assignRole($admin);
        $clubUser->assignRole($club);
        $escuelaUser->assignRole($escuelas);
        $federacionUser->assignRole($federacion);
        $territorialesUser->assignRole($territoriales);
    }
}
