<?php

use Illuminate\Support\Facades\Route;

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
        } else {
            return view('alunos.index')->with('titulo', "IFConnection"); // Rota padrão para outros tipos de usuário
        }
    })->name('dashboard');

    Route::resource('/cursos', '\App\Http\Controllers\CursoController');

    Route::resource('projetos', 'ProjetoController');
    Route::resource('alunos', 'AlunoController');
    Route::resource('orientacao', 'OrientacaoController');
    Route::resource('professores', 'ProfessorController');
});

require __DIR__.'/auth.php';