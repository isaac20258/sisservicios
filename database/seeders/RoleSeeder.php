<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' =>'ADMINISTRADOR']);


         //Rutas para configuraciones
        Permission::create(['name'=>'admin.configuraciones.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.configuraciones.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.configuraciones.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.configuraciones.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.configuraciones.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.configuraciones.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.configuraciones.destroy'])->syncRoles($admin);

        //Rutas para Roles

        Permission::create(['name'=>'admin.roles.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.asignar_roles'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.update_asignar'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.roles.destroy'])->syncRoles($admin);

        // rutas para los Usuarios

        Permission::create(['name'=>'admin.usuarios.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.usuarios.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.usuarios.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.usuarios.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.usuarios.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.usuarios.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.usuarios.destroy'])->syncRoles($admin);

        //rutas para  servicios

        Permission::create(['name'=>'admin.servicios.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.servicios.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.servicios.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.servicios.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.servicios.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.servicios.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.servicios.destroy'])->syncRoles($admin);


         //rutas para  Clientes

        Permission::create(['name'=>'admin.clientes.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.clientes.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.clientes.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.clientes.show'])->syncRoles($admin);
        Permission::create(['name'=>'admin.clientes.edit'])->syncRoles($admin);
        Permission::create(['name'=>'admin.clientes.update'])->syncRoles($admin);
        Permission::create(['name'=>'admin.clientes.destroy'])->syncRoles($admin);


        //rutas para  solicitud

        Permission::create(['name'=>'admin.solicitud.index'])->syncRoles($admin);
        Permission::create(['name'=>'admin.solicitud.create'])->syncRoles($admin);
        Permission::create(['name'=>'admin.solicitud.cliente.obtenerCliente'])->syncRoles($admin);
        Permission::create(['name'=>'admin.solicitud.store'])->syncRoles($admin);
        Permission::create(['name'=>'admin.solicitud.destroy'])->syncRoles($admin);

    }
}
