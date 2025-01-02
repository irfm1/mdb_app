<?php

use App\Http\Controllers\CampeonatosController;
use App\Livewire\AdminPacotes;
use App\Livewire\Casas;
use App\Livewire\Dashboard;
use App\Livewire\MultiStepRegistration;
use App\Livewire\Roles;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', function () {
            // Simulação de dados (substituir por consultas reais)
            $totalRevenue = 12500.75;
            $totalAccess = 1543;
            $conversionRate = 12.5; // Em porcentagem
            $otherMetric = 200; // Outra métrica importante

            $revenueData = [
                'labels' => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],
                'values' => [2000, 3000, 2500, 3500, 4500]
            ];

            $accessData = [
                'labels' => ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],
                'values' => [500, 700, 650, 800, 900]
            ];

            return view('admin.index', compact(
                'totalRevenue',
                'totalAccess',
                'conversionRate',
                'otherMetric',
                'revenueData',
                'accessData'
            ));
    })->name('admin.dashboard');
    Route::get('/login', function () {
        return view('admin.login');
    })->name('admin.login');

    //casa de apostas resources
//    Route::resource('casas', 'App\Http\Controllers\CasaDeApostaController');
    Route::get('casas', Casas::class)->name('admin.casas.index');
    Route::get('roles', Roles::class)->name('admin.roles.index');
    Route::get('users', Users::class)->name('admin.users.index');
    Route::get('pacotes', AdminPacotes::class)->name('admin.pacotes.index');
});

Route::get('/register', MultiStepRegistration::class)->name('register');

Route::get('/campeonatos', [CampeonatosController::class, 'index'])->name('campeonatos.index');
Route::get('/campeonatos/{id}', [CampeonatosController::class, 'show'])->name('campeonatos.show');
Route::get('/campeonatos/{id}/tabela', [CampeonatosController::class, 'tabela'])->name('campeonatos.tabela');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

});
