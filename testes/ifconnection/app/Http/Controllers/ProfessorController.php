<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    
    public function index()
    {
        
        $user = Auth::user();

        return view('professores.index', compact(['user']));
    }

   
    public function create()
    {
        return view('professores.create');
    }

   
    public function store(Request $request){
    
        $request->validate([
            'lattes' => 'required|url', 
        ]);

    
        $user = Auth::user();
        $user->lattes = $request->input('lattes');
        $user->save();

    
        return redirect()->route('professores.index')->with('success', 'Link do Lattes cadastrado com sucesso!');
    }

  
    public function show($id)
    {
        //
    }


    public function edit($id){
    
        $user = Auth::user();

        return view('professores.edit', compact('user'));
    }

    
    public function update(Request $request, $id){
        $user = User::find($id);

        if (!$user) {
            return abort(404);
        }

        $user->lattes = $request->input('lattes');
        $user->save();

        return redirect()->route('professores.index')->with('success', 'Lattes atualizado com sucesso!');
    }
    
    public function destroy($id)
    {
        //
    }
}
