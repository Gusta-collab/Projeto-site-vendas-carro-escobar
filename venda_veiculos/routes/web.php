<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicoController;  //  controller público
use App\Http\Controllers\Admin\MarcaController; //  controller de Marcas
use App\Http\Controllers\Admin\CorController; //controller cores
use App\Http\Controllers\Admin\ModeloController; //ciontroller modelos
use App\Http\Controllers\Admin\VeiculoController; // controller de veiculos 


Route::get('/', [PublicoController::class, 'index'])->name('home');
Route::get('/veiculo/{veiculo}', [PublicoController::class, 'show'])->name('veiculo.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); // <-- O NOME CORRETO É 'dashboard'

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//fazendo desse jeito eu mando tudo pra admin sem precisar ficar fazendo rota toda hora com o caminho do admin desse jeito fica mais pratico
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::resource('marcas', MarcaController::class);
    Route::resource('cores', CorController::class)->parameters(['cores'=>'cor']);
    Route::resource('modelos', ModeloController::class);
    Route::resource('veiculos', VeiculoController::class);
});

require __DIR__.'/auth.php';