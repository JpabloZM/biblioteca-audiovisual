<?php

namespace Database\Seeders;

use App\Models\Formato;
use Illuminate\Database\Seeder;

class FormatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formatos = [
            ['nombre' => 'MP4', 'descripcion' => 'Formato de video digital'],
            ['nombre' => 'MKV', 'descripcion' => 'Formato contenedor multimedia'],
            ['nombre' => 'AVI', 'descripcion' => 'Formato de video tradicional'],
            ['nombre' => 'WebM', 'descripcion' => 'Formato web optimizado'],
        ];

        foreach ($formatos as $formato) {
            Formato::create($formato);
        }
    }
}
