<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProjectController::class, 'index']);

Route::get('/projects/create', [ProjectController::class, 'create']);

Route::post('/projects', [ProjectController::class, 'store']);

Route::get('/projects/{project}/child/create', [ProjectController::class, 'createChild']);

Route::post('/projects/child/{project}', [ProjectController::class, 'storeChild']);
