<?php

namespace App\Http\Controllers;

use App\Models\Formato;
use Illuminate\Http\Request;

class FormatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formatos = Formato::withCount('contenidos')->get();
        return response()->json($formatos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:formatos',
            'descripcion' => 'required|string'
        ]);

        $formato = Formato::create($request->all());
        return response()->json($formato, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $formato = Formato::with('contenidos')->findOrFail($id);
        return response()->json($formato);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $formato = Formato::findOrFail($id);
        
        $request->validate([
            'nombre' => 'string|max:255|unique:formatos,nombre,' . $id,
            'descripcion' => 'string'
    ]);

        $formato->update($request->all());
        return response()->json($formato);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formato = Formato::findOrFail($id);
        $formato->delete();
        return response()->json(null, 204);
    }
}
