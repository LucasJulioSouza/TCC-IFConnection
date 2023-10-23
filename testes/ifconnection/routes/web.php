<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/orientacao', function () {
    
})->middleware('blockAccess');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        $userType = $user->type_id;
        $ativo = $user->ativo;

        if ($ativo === 0) {
            return view('userDesativado'); // Redireciona para a view de usuário desativado
        }

        if ($userType === 1) {
            return redirect()->route('professores.index'); 
        } elseif ($userType === 2) {
            return redirect()->route('alunos.index'); 
        } elseif ($userType === 3) {
            return redirect()->route('admin.index'); 
        } else {
            return view('alunos.index')->with('titulo', "IFConnection");
        }
    })->name('dashboard');

    Route::resource('projetos', 'ProjetoController');
    Route::resource('alunos', 'AlunoController');
    Route::resource('orientacao', 'OrientacaoController');
    
    

    Route::middleware(['custom-auth-admin'])->group(function () {
        Route::resource('admin', 'AdminController');
        Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);
        Route::put('/admin/ativar-usuario/{id}', 'AdminController@ativarUsuario')->name('admin.ativarUsuario');
        Route::put('/admin/desativar-usuario/{id}', 'AdminController@desativarUsuario')->name('admin.desativarUsuario');
        Route::resource('materias', 'MateriaController');
    });

    Route::middleware(['custom-auth-professor'])->group(function () {
        Route::resource('professores', 'ProfessorController');
        Route::get('professores/edit/{id}', 'ProfessorController@edit')->name('professores.edit');
        Route::put('/professores/{id}', 'ProfessorController@update')->name('professores.update');
        Route::get('/professores/projetos', 'ProfessorController@projetos')->name('professores.projetos');
        Route::resource('materiasProfessor', 'MateriasProfessorController');
        Route::get('materiasProfessor/{userId}/edit', 'MateriasProfessorController@edit')->name('materiasProfessor.edit');
        Route::put('materiasProfessor/{userId}', 'MateriasProfessorController@update')->name('materiasProfessor.update');
    });
});


require __DIR__.'/auth.php';

