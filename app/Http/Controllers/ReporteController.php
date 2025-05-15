<?php

namespace App\Http\Controllers;

use App\Models\Contenido;
use App\Models\Categoria;
use App\Models\Formato;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function contenidosPorCategoria()
    {
        $report = Categoria::withCount('contenidos')
            ->having('contenidos_count', '>', 0)
            ->orderBy('contenidos_count', 'desc')
            ->get();
            
        return response()->json([
            'data' => $report,
            'total_contenidos' => Contenido::count()
        ]);
    }

    public function contenidosPorFormato()
    {
        $report = Formato::withCount('contenidos')
            ->having('contenidos_count', '>', 0)
            ->orderBy('contenidos_count', 'desc')
            ->get();
            
        return response()->json([
            'data' => $report,
            'total_contenidos' => Contenido::count()
        ]);
    }

    public function estadisticasGenerales()
    {
        return response()->json([
            'total_contenidos' => Contenido::count(),
            'total_categorias' => Categoria::count(),
            'total_formatos' => Formato::count(),
            'contenidos_recientes' => Contenido::latest()->take(5)->get()
        ]);
    }
}
