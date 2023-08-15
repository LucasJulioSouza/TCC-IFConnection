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
    return view('auth.login');
});

Route::get('/orientacao', function () {
    // Conteúdo da rota...
})->middleware('blockAccess');

Route::get('/dashboard', function () {
    return view('alunos.index')->with('titulo', "IFConnection");
})->middleware(['auth'])->name('dashboard');

Route::resource('/cursos', '\App\Http\Controllers\CursoController')
    ->middleware(['auth']);

Route::resource('projetos', 'ProjetoController');
Route::resource('alunos', 'AlunoController');
Route::resource('orientacao', 'OrientacaoController');

require __DIR__.'/auth.php';
