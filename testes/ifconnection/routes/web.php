<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/orientacao', function () {
    // Conteúdo da rota...
})->middleware('blockAccess');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $userType = auth()->user()->type_id;

        if ($userType === 1) {
            return view('professores.index'); // Rota para o painel dos professores
        } elseif ($userType === 2) {
            return view('alunos.index'); // Rota para o painel dos alunos
        } elseif ($userType === 3) {
            return redirect()->action('AdminController@index');  // Rota padrão para outros tipos de usuário
        } else {
            return view('alunos.index')->with('titulo', "IFConnection"); // Rota padrão para outros tipos de usuário
        }
    })->name('dashboard');

    Route::resource('/cursos', '\App\Http\Controllers\CursoController');
    Route::resource('projetos', 'ProjetoController');
    Route::resource('alunos', 'AlunoController');
    Route::resource('orientacao', 'OrientacaoController');
    Route::resource('professores', 'ProfessorController');
    Route::resource('admin', 'AdminController');


    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::get('/admin/create', 'AdminController@create')->name('admin.create');

    
});

require __DIR__.'/auth.php';

