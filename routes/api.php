<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ContenidoController;
use App\Http\Controllers\FormatoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ReporteController;

// Test route to verify API is working
Route::get('test', function() {
    return response()->json(['message' => 'API is working']);
});

// Public routes
Route::get('categorias', [CategoriaController::class, 'index']);
Route::get('categorias/{id}', [CategoriaController::class, 'show']);
Route::post('categorias', [CategoriaController::class, 'store']);
Route::put('categorias/{id}', [CategoriaController::class, 'update']);
Route::delete('categorias/{id}', [CategoriaController::class, 'destroy']);

// Rutas públicas
Route::apiResource('contenidos', ContenidoController::class)->only(['index', 'show']);
Route::apiResource('formatos', FormatoController::class)->only(['index', 'show']);

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    // CRUD completo para administradores
    Route::apiResource('contenidos', ContenidoController::class)->except(['index', 'show']);
    Route::apiResource('categorias', CategoriaController::class)->except(['index', 'show']);
    Route::apiResource('formatos', FormatoController::class)->except(['index', 'show']);
    Route::apiResource('usuarios', UsuarioController::class);
    
    // Rutas de reportes
    Route::prefix('reportes')->group(function () {
        Route::get('contenidos-por-categoria', [ReporteController::class, 'contenidosPorCategoria']);
        Route::get('contenidos-por-formato', [ReporteController::class, 'contenidosPorFormato']);
        Route::get('estadisticas-generales', [ReporteController::class, 'estadisticasGenerales']);
    });
});