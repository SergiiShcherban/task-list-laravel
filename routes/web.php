<?php

use App\Http\Controllers\TasksController;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::group(['prefix' => 'tasks'], function () {
    Route::get('/', [TasksController::class,'index'])->name('tasks.index');
    Route::post('/', [TasksController::class, 'store'])->name('tasks.store');
    Route::delete('/{task}', [TasksController::class, 'destroy'])->name('tasks.destroy');
    Route::put('/{task}/complete', [TasksController::class, 'update'])->name('tasks.toggle-complete');
});
