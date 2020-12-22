<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleTaskController;

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
Route::get('/sum', [SimpleTaskController::class, 'view']);
Route::post('/sum', [SimpleTaskController::class, 'sum']);
Route::get('/exampletoken', fn() => csrf_token());
