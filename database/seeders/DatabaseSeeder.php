<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Noticias;
use App\Models\Pagina;
use App\Models\Tramites;
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

        Permission::create(['name' => 'usuarios', 'description' => 'Gestionar Usuarios'])->syncRoles($admin);
        Permission::create(['name' => 'roles', 'description' => 'Gestionar Roles'])->syncRoles($admin);
        Permission::create(['name' => 'noticias', 'description' => 'Gestionar Noticias'])->syncRoles($admin);
        Permission::create(['name' => 'tramites', 'description' => 'Gestionar Tramites'])->syncRoles($admin);
        Permission::create(['name' => 'pagina', 'description' => 'Gestionar Pagina'])->syncRoles($admin);
        Permission::create(['name' => 'eliminar', 'description' => 'Eliminar Registros'])->syncRoles($admin);

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
            'imagen_principal' => '',
            'calendario_academico' => '',
            'plan_estudio' => '',
        ]);

        for ($i = 0; $i < 50; $i++) {
            $titulo = 'Titulo ' . $i;
            $slug = 'titulo-' . $i;
            Noticias::create([
                'titulo' => $titulo,
                'slug' => $slug,
                'descripcion' => 'loremp ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'fecha' => '21 de septiembre de 2021',
                'imagen_principal' => 'https://picsum.photos/seed/800/600',
                'contenido' => '
                    loremp ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
                    loremp ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
                    loremp ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
                    loremp ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.
                    loremp ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. '
            ]);
            Tramites::create([
                'titulo' => $titulo,
                'descripcion' => 'loremp ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.',
                'fecha' => '21 de septiembre de 2021',
                'imagen_principal' => 'https://picsum.photos/seed/800/600',
                'modelo_carta' => 'https://picsum.photos/seed/800/600',
            ]);
        }



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
