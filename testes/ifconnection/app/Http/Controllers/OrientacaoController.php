<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Projeto;
use App\Models\Orientacao;

class OrientacaoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orientacoes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($professorId)
    {
        $nomeDoProfessor = User::find($professorId)->name;

        $projetos = Projeto::where('user_id', auth()->user()->id)->get(); 
        
        return view('orientacoes.create', compact('nomeDoProfessor', 'projetos', 'professorId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orientacao = new Orientacao();
        $orientacao->professor_id = $request->input('professor_id'); 
        $orientacao->aluno_id = auth()->user()->id; 
        $orientacao->projeto_id = $request->input('projeto');
        

        $orientacao->save();

        
        return redirect()->route('alunos.index');
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

    public function solicitacoes(){
    
        $userId = auth()->id();
    
        $solicitacoes = Orientacao::where('professor_id', $userId)->where('status', 'pendente')->get();

        return view('orientacoes.solicitacoes',compact('solicitacoes'));
    }

}
