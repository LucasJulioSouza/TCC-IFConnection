<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{


    public function documentoIndex($id) {
        $documentos = Documento::where('orientacao_id', $id)->get();
        return view('gestao.documento', compact('id', 'documentos'));
    }




    public function cadastrarDocumento($id){

        return view('gestao.cadastrarDocumento', compact('id'));

    }

    public function salvarDocumento(Request $request){

        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'documento' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);


        $documento = new Documento();
        $documento->nome = $request->nome;
        $documento->descricao = $request->descricao;
        $documento->orientacao_id = $request->orientacao_id;

        if ($request->hasFile('documento')) {
            $documentoArquivo = $request->file('documento');
            $nomeArquivo = time() . '_' . $documentoArquivo->getClientOriginalName();
            $caminho = $documentoArquivo->storeAs('documentos', $nomeArquivo);
            $documento->documento = $caminho;
        }

        $documento->save();

        return redirect()->route('gestao.documento', ['id' => $request->orientacao_id]);

    }



    public function download($id){
        $documento = Documento::find($id);

        $pathToFile = storage_path('app/' . $documento->documento);
        $nomeDoArquivo = $documento->nome_do_documento;

        return response()->download($pathToFile, $nomeDoArquivo);
    }

    public function createComentario($id){

        $documento = Documento::findOrFail($id);

        $comentarioExistente= $documento->comentario;

        return view('gestao.cadastrarComentario',  compact('id','comentarioExistente'));
    }

    public function salvarComentario(Request $request, $id){

        $request->validate([

            'comentario' => 'nullable|string',

        ]);


        $documento = Documento::findOrFail($id);

        $documento->update(['comentario' => $request->input('comentario')]);


        return redirect()->route('gestao.documento', ['id' => $documento->orientacao_id]);
    }

}
