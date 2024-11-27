<?php

use App\Livewire\Casas;
use App\Livewire\Roles;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.dashboard');
    Route::get('/login', function () {
        return view('admin.login');
    })->name('admin.login');

    //casa de apostas resources
//    Route::resource('casas', 'App\Http\Controllers\CasaDeApostaController');
    Route::get('casas', Casas::class)->name('admin.casas.index');
    Route::get('roles', Roles::class)->name('admin.roles.index');
    Route::get('users', Users::class)->name('admin.users.index');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
