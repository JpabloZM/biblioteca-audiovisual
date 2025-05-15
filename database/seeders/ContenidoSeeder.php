<?php

namespace Database\Seeders;

use App\Models\Contenido;
use Illuminate\Database\Seeder;

class ContenidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contenidos = [
            [
                'titulo' => 'Introducción a Laravel',
                'descripcion' => 'Tutorial básico de Laravel',
                'url' => 'https://ejemplo.com/video1',
                'categoria_id' => 4, // Tutoriales
                'formato_id' => 1, // MP4
            ],
            [
                'titulo' => 'El Planeta Azul',
                'descripcion' => 'Documental sobre océanos',
                'url' => 'https://ejemplo.com/video2',
                'categoria_id' => 3, // Documentales
                'formato_id' => 2, // MKV
            ],
        ];

        foreach ($contenidos as $contenido) {
            Contenido::create($contenido);
        }
    }
}
