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

    
    public function update(Request $request, $id)
{
    $user = User::find($id);

    // Verifique se um arquivo de foto foi enviado
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('profile_photos', $fileName); // Salve a foto na pasta 'profile_photos'

        // Atualize o caminho da foto no banco de dados
        $user->image = $filePath;
    }

    // Outras atualizações de perfil
    $user->lattes = $request->input('lattes');
    // ...

    $user->save();

    return redirect()->route('professores.index')->with('success', 'Perfil atualizado com sucesso!');
}

    
    public function destroy($id)
    {
        //
    }
}
