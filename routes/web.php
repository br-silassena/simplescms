<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EquipamentoController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'login']);
Route::get('/logar', [LoginController::class, 'logar']);


Route::middleware('authuser')->group(function () {
   
    Route::group(['prefix' => 'admin'], function() { 

        Route::get('/logout', function(){
            Auth::logout();
            return redirect('login');
        });
    
        Route::get('/', [AdminController::class, 'index']);
        Route::resource('equipamentos', EquipamentoController::class);
        Route::resource('usuarios', UsuarioController::class);
    });
});

