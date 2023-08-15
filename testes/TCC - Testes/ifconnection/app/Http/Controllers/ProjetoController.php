<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos= Projeto::all();

        return view('projetos.index',compact(['projetos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('projetos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         
        $request->validate([
        'titulo' => 'required',
        'resumo' => 'required',
        'foto'=> 'required'
        ]);

    
        $userId = Auth::id();
        $user = User::find($userId);
    
        $projeto = new Projeto();
        $projeto->titulo = $request->titulo;
        $projeto->resumo = $request->resumo;
        $projeto->foto = $request->foto;
        $projeto->user()->associate($user);
        $projeto->save();

        return redirect()->route('projetos.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function show(Projeto $projeto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projeto = Projeto::findOrFail($id);
        return view('projetos.edit', compact('projeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projeto $projeto)
    {
        $request->validate([
            'titulo' => 'required',
            'resumo' => 'required',
            'foto' => 'required',
        ]);
    
        $projeto->update([
            'titulo' => $request->titulo,
            'resumo' => $request->resumo,
            'foto' => $request->foto,
        ]);
    
        return redirect()->route('projetos.index')->with('success', 'Projeto atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projeto  $projeto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Projeto::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->destroy($id);

        return redirect()->route('projetos.index');
    }
}
