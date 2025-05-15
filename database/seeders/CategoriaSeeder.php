<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Películas', 'descripcion' => 'Contenido cinematográfico'],
            ['nombre' => 'Series', 'descripcion' => 'Series de televisión'],
            ['nombre' => 'Documentales', 'descripcion' => 'Contenido documental'],
            ['nombre' => 'Tutoriales', 'descripcion' => 'Videos educativos'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
