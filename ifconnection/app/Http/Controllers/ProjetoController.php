<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use App\Models\User;
use App\Models\Orientacao;
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
        $projetos = Projeto::with('user')->get();
        $orientacoes = Orientacao::all();

        return view('projetos.index',compact(['projetos','orientacoes']));
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



        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->move(public_path('img/projeto'), $fileName); 
    
        
            $projeto->foto = 'img/projeto/' . $fileName;
        }



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
    public function update(Request $request, $projetoId){
        
        $request->validate([
            'titulo' => 'required|string|max:255',
            'resumo' => 'required|string',
            'foto'   => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        $projeto = Projeto::findOrFail($projetoId);

        $projeto->titulo = $request->input('titulo');
        $projeto->resumo = $request->input('resumo');

        if ($request->hasFile('foto')) {
            // Apague a imagem antiga se ela existir
            if ($projeto->foto) {
                $oldImagePath = public_path($projeto->foto);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->move(public_path('img/projeto'), $fileName); // Salve a foto na pasta 'img/projeto'

            // Atualize o caminho da foto no banco de dados
            $projeto->foto = 'img/projeto/' . $fileName;
        }

        // Salvar as alterações no banco de dados
        $projeto->save();

        // Redirecionar de volta à página de índice ou qualquer outra rota desejada
        return redirect()->route('projetos.index');
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



    public function cadastrarProjeto(Request $request)
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



        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('projetos/fotos', 'public');
            $projeto->foto = $fotoPath;
        }


        $projeto->user()->associate($user);
        $projeto->save();

        return redirect()->route('projetos.index');

    }
}
