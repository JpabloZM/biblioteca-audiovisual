<?php

namespace App\Http\Controllers;

use App\Models\Contenido;
use Illuminate\Http\Request;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contenidos = Contenido::with(['categoria', 'formato'])->paginate(10);
        return response()->json($contenidos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'url' => 'required|url',
            'categoria_id' => 'required|exists:categorias,id',
            'formato_id' => 'required|exists:formatos,id'
        ]);

        $contenido = Contenido::create($request->all());
        return response()->json($contenido, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contenido = Contenido::with(['categoria', 'formato'])->findOrFail($id);
        return response()->json($contenido);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contenido = Contenido::findOrFail($id);
        
        $request->validate([
            'titulo' => 'string|max:255',
            'descripcion' => 'string',
            'url' => 'url',
            'categoria_id' => 'exists:categorias,id',
            'formato_id' => 'exists:formatos,id'
        ]);

        $contenido->update($request->all());
        return response()->json($contenido);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contenido = Contenido::findOrFail($id);
        $contenido->delete();
        return response()->json(null, 204);
    }
}
