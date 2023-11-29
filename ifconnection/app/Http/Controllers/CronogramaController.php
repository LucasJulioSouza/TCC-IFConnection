<?php

namespace App\Http\Controllers;

use App\Models\Cronograma;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CronogramaController extends Controller
{

    public function CronogramaIndex($id){

        $cronogramas = Cronograma::where('orientacao_id', $id)->get();
        return view('gestao.cronograma',  compact('id','cronogramas'));
    }



    public function cadastrarCronograma($id){


        return view('gestao.cronogramaCadastrar', compact('id'));
    }

    public function salvarCronograma(Request $request, $id){

        $request->validate([

            'tarefa' => 'required|string',

            'data' => 'required|date',

        ]);


        Cronograma::create([

            'tarefa' => $request->input('tarefa'),

            'data' => $request->input('data'),

            'orientacao_id' => $id,

        ]);


        return redirect()->route('gestao.cronograma', ['id' => $id]);

    }


    public function editarCronograma($id){

        $cronograma = Cronograma::findOrFail($id);

        return view('gestao.cronogramaEditar', compact('cronograma'));

    }


    public function atualizarCronograma(Request $request, $id){
        $request->validate([
            'tarefa' => 'required|string',
            'data' => 'required|date',
        ]);

        $cronograma = Cronograma::findOrFail($id);

        $cronograma->update([
            'tarefa' => $request->input('tarefa'),
            'data' => $request->input('data'),
        ]);

        return redirect()->route('gestao.cronograma', ['id' => $cronograma->orientacao_id]);
    }

    public function excluirCronograma($id, $cronogramaId){

        $tarefa = Cronograma::findOrFail($cronogramaId);

        $tarefa->delete();


        return redirect()->route('gestao.cronograma', ['id' => $id])->with('success', 'Tarefa excluída com sucesso!');
    }




}
