<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orientacao;
use App\Models\User;
use App\Models\Documento;
use App\Models\Reuniao;
use App\Models\Cronograma;

class GestaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->id();
        $typeUserId = User::where('id', $userId)->value('type_id');
        $orientacoes = collect();

        if ($typeUserId === 1) {
            $orientacoes = Orientacao::where('professor_id', $userId)->get();
        } elseif ($typeUserId === 2) {
            $orientacoes = Orientacao::where('aluno_id', $userId)->get();
        }

    return view('gestao.index', compact('orientacoes', 'typeUserId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

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


    
    public function reuniaoIndex($id)
    {
        return view('gestao.reuniao',compact('id'));
    }

    public function CronogramaIndex($id)
    {
        return view('gestao.cronograma',  compact('id'));
    }



}
