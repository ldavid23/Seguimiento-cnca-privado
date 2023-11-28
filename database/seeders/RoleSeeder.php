<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role1 = Role::create(['name' => 'ADMINISTRADOR']);
        $role2 = Role::create(['name' => 'INSTRUCTOR-SEGUIMIENTO']);
        $role3 = Role::create(['name' => 'COORDINADOR']);

        $usuario = \App\Models\User::find(1);
        $usuario->assignRole($role1);
        $usuario = \App\Models\User::find(2);
        $usuario->assignRole($role2);
        $usuario = \App\Models\User::find(3);
        $usuario->assignRole($role3);
    }
}
