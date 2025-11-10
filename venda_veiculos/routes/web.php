<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//template carros rotas do carro vão ficar em seguida ok?
use App\Http\Controllers\PublicoController;

 Route::view('/carros','carros.index') -> name('carros.index');

 Route::get('/',[PublicoController::class,'index'])->name('home');

 require __DIR__.'/auth.php';

 //rota para a aba de detalhes do carro
 Route::get('veiculo/{veiculo}',[PublicoController::class,'show'])->name('veiculo.show');
