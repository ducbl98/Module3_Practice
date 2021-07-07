<?php

use App\Http\Controllers\AgentController;
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

Route::get('/', function () {
    return view('home');
});
Route::prefix('/agent')->group(function (){
    Route::get('/list',[AgentController::class,'index'])->name('agent.list');
    Route::get('/create',[AgentController::class,'create'])->name('agent.create');
    Route::post('/store',[AgentController::class,'store'])->name('agent.store');
    Route::get('/{id}/edit',[AgentController::class,'edit'])->name('agent.edit');
    Route::post('/{id}/update',[AgentController::class,'update'])->name('agent.update');
    Route::get('/{id}/destroy',[AgentController::class,'destroy'])->name('agent.destroy');
    Route::get('/search',[AgentController::class,'search'])->name('agent.search');
});
