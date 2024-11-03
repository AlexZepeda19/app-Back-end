<?php

use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\API\WorkerProfileController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MultimediaProjectController;
use App\Http\Controllers\API\MultimediaPublicationController;
use App\Http\Controllers\API\ProfessionController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\RolController;
use App\Http\Controllers\API\PublicationController;
use App\Http\Controllers\API\SkillController;
use App\Http\Controllers\API\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Rutas de recursos para proyecto multimedia
Route::apiResource('multimedia-projects', MultimediaProjectController::class);

// Rutas de recursos para publicación multimedia
Route::apiResource('multimedia-publication', MultimediaPublicationController::class);

// Rutas de recursos para profesiones
Route::apiResource('profession', ProfessionController::class);

// Rutas de recursos para perfil
Route::apiResource('profile', ProfileController::class);

// Rutas de recursos para proyecto
Route::apiResource('projects', ProjectController::class);

// Rutade de recursos para informacion de perfil
Route::get('worker-profiles', [WorkerProfileController::class]);

// Rutas de recursos para Publicaciones
 Route::apiResource('publications', PublicationController::class);

// Rutas de recursos para Skills
 Route::apiResource('skills', SkillController::class);

// Rutas de recursos para Usuarios
 Route::apiResource('users', UserController::class);

// Rutas de recursos para rol
Route::apiResource('rol', RolController::class);

//Ruta para toda la informacion de perfil
Route::get('/worker-profiles', [WorkerProfileController::class, 'index']);


//Rutas para contacto
Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts', [ContactController::class, 'store']);
Route::get('/contacts/{id}', [ContactController::class, 'show']);
Route::put('/contacts/{id}', [ContactController::class, 'update']);
Route::delete('/contacts/{id}', [ContactController::class, 'destroy']);

//Rutas de autenticacion
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::put('/change-role/{id}', [AuthController::class, 'changeRole'])->middleware('auth:sanctum');



