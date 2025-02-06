<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('task')->group(function(){

    Route::get('/', [TaskController::class, 'index'])->name('tasks');
    Route::post('/', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('{id}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::put('{id}/state/{state_id}', [TaskController::class, 'changeState'])->name('tasks.state');
});
