<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pagina;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admin = Role::create(['name' => 'Administrador']);
        User::create([
            'name' => 'Test User',
            'email' => 'example@live.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Administrador');

        Pagina::create([
            'telefono' => '',
            'correo' => '',
            'direccion' => '',
            'url_facebook' => '',
            'url_whatsapp' => '',
            'url_imagen_principal' => '',
            'url_calendario_academico' => '',
            'url_plan_estudio' => '',
            'nombre_imagen' => '',
            'nombre_calendario' => '',
            'nombre_plan_estudio' => '',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
