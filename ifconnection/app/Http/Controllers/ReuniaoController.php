<?php

namespace App\Http\Controllers;

use App\Models\Reuniao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReuniaoController extends Controller
{

    public function reuniaoIndex($id)
    {

        $reunioes = Reuniao::where('orientacao_id', $id)->get();
        return view('gestao.reuniao',compact('id','reunioes'));
    }


    public function cadastrarReuniao($id){

        return view('gestao.cadastrarReuniao', compact('id'));

    }

    public function salvarReuniao(Request $request){

        $request->validate([
            'tema' => 'required',
            'link' => 'required|url',
            'data' => 'required|date',
        ]);


        $reuniao = new Reuniao([
            'tema' => $request->input('tema'),
            'link' => $request->input('link'),
            'data' => $request->input('data'),
            'orientacao_id' => $request->input('orientacao_id'),
        ]);



        $reuniao->save();

        return redirect()->route('gestao.reuniao', ['id' => $request->orientacao_id]);

    }

    public function cadastrarAta($id){

        return view('gestao.cadastrarAta', compact('id'));
    }

    public function salvarAta(Request $request, $reuniao){

        $request->validate([

            'ata' => 'required|string',

        ]);

        $reuniaoUpdate = Reuniao::find($reuniao);
        $reuniaoUpdate->update([

            'ata' => $request->input('ata'),

        ]);

        $reuniaoUpdate->save();


        return redirect()->route('gestao.reuniao', ['id' => $reuniaoUpdate->orientacao_id]);
    }



}
