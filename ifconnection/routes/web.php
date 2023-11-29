<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;


require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth.login');
});


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
    Route::post('/projetos', 'ProjetoController@store')->name('projetos.store');

    Route::resource('alunos', 'AlunoController');

    Route::resource('orientacoes', 'OrientacaoController');
    Route::get('/orientacoes/create/{professorId}', 'OrientacaoController@create')->name('orientacoes.create');

    Route::resource('gestao', 'GestaoController');

    Route::get('gestao/{id}/documento', 'DocumentoController@documentoIndex')->name('gestao.documento');
    Route::get('/download/{id}', 'DocumentoController@download')->name('documento.download');
    Route::get('/documento/cadastrar/{id}', 'DocumentoController@cadastrarDocumento')->name('documento.cadastrar');
    Route::post('/documento/salvar', 'DocumentoController@salvarDocumento')->name('documento.salvar');
    Route::get('/documentos/novo-comentario/{id}', 'DocumentoController@createComentario')->name('documento.novoComentario');
    Route::post('/documentos/salvar-comentario/{id}','DocumentoController@salvarComentario')->name('documento.salvarComentario');


    Route::get('gestao/{id}/reuniao', 'ReuniaoController@reuniaoIndex')->name('gestao.reuniao');
    Route::get('/reuniao/cadastrar/{id}', 'ReuniaoController@cadastrarReuniao')->name('reuniao.cadastrar');
    Route::post('/reuniao/salvar', 'ReuniaoController@salvarReuniao')->name('reuniao.salvar');
    Route::get('/reunioes/cadastrar-ata/{id}', 'ReuniaoController@cadastrarAta')->name('reuniao.cadastrarAta');
    Route::post('reunioes/salvar-ata/{reuniao}', 'ReuniaoController@salvarAta')->name('reuniao.salvar-ata');


    Route::get('/gestao/cronograma/{id}', 'CronogramaController@cronogramaIndex')->name('gestao.cronograma');
    Route::get('/gestao/cronograma/cadastrar/{id}', 'CronogramaController@cadastrarCronograma')->name('cronograma.cadastrar');
    Route::post('/gestao/cronograma/salvar/{id}', 'CronogramaController@salvarCronograma')->name('cronograma.salvar');
    Route::get('/gestao/cronograma/editar/{id}', 'CronogramaController@editarCronograma')->name('cronograma.editar');
    Route::put('/gestao/cronograma/atualizar/{id}', 'CronogramaController@atualizarCronograma')->name('cronograma.atualizar');
    Route::delete('/gestao/cronograma/excluir/{id}/{cronogramaId}', 'CronogramaController@excluirCronograma')->name('cronograma.excluir');






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

        Route::resource('materiasProfessor', 'MateriasProfessorController');
        Route::get('materiasProfessor/{userId}/edit', 'MateriasProfessorController@edit')->name('materiasProfessor.edit');
        Route::put('materiasProfessor/{userId}', 'MateriasProfessorController@update')->name('materiasProfessor.update');

        Route::get('/orientacoes/solicitacoes', 'OrientacaoController@solicitacoes')->name('orientacoes.solicitacoes');
        Route::put('/orientacoes/{orientacao}/aceitar', 'OrientacaoController@aceitar')->name('orientacoes.aceitar');
        Route::put('/orientacoes/{orientacao}/recusar', 'OrientacaoController@recusar')->name('orientacoes.recusar');
    });
});


require __DIR__.'/auth.php';

