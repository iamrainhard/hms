<?php

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
    return view('landing');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/requests/all', [App\Http\Controllers\RequestController::class, 'index']);
Route::get('/requests/approved', [App\Http\Controllers\RequestController::class, 'approved']);
Route::get('/request', [App\Http\Controllers\RequestController::class, 'create']);
Route::post('/request', [App\Http\Controllers\RequestController::class, 'store']);
Route::get('/request/{request}/edit', [App\Http\Controllers\RequestController::class, 'edit']);
Route::put('/request/{request}', [App\Http\Controllers\RequestController::class, 'update']);

Route::get('/hostels', [\App\Http\Controllers\HostelController::class, 'index']);
Route::get('/hostels/create', [\App\Http\Controllers\HostelController::class, 'create']);
Route::post('/hostels', [\App\Http\Controllers\HostelController::class, 'store']);
Route::get('/hostels/{hostel}/edit', [\App\Http\Controllers\HostelController::class,'edit']);
Route::put('/hostels/{hostel}', [\App\Http\Controllers\HostelController::class, 'update']);
Route::delete('/hostels/{hostel}', [\App\Http\Controllers\HostelController::class, 'destroy']);

Route::get('/rooms/management', [\App\Http\Controllers\RoomController::class, 'index']);
//Route::get('/rooms/create', [\App\Http\Controllers\RoomController::class, 'create']);
//Route::post('/rooms', [\App\Http\Controllers\RoomController::class, 'store']);
Route::delete('/rooms/{room}', [\App\Http\Controllers\RoomController::class, 'destroy']);

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit']);

//json routes
Route::post('/get-room-by-hostel', [\App\Http\Controllers\UserController::class, 'getRoom']);
Route::post('/get-room-by-request', [\App\Http\Controllers\RequestController::class, 'getRoom']);
//end json routes

Route::put('/users/{user}', [\App\Http\Controllers\UserController::class, 'update']);
Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'detsroy']);
Route::get('/userroom/{user}/edit', [\App\Http\Controllers\UserController::class, 'userRoom']);
Route::put('/userroom/{user}', [\App\Http\Controllers\UserController::class, 'userRoomUpdate']);
