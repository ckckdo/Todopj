<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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
    return view('welcome');
});

Route::get('/',[TodosController::class,'index']);
Route::group(['prefix' => 'todo'], function() {
    Route::get('create',[TodosController::class,'create']);
    Route::post('create',[TodosController::class,'create']);
    Route::get('update',[TodosController::class,'update']);
    Route::post('update',[TodosController::class,'update']);
    Route::get('delete',[TodosController::class,'delete']);
    Route::post('delete',[TodosController::class,'delete']);

});