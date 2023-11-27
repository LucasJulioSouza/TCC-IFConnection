<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Projeto;
use App\Models\Orientacao;
use App\Models\materias_professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorController extends Controller
{
    
    public function index()
    {
        
        $user = Auth::user();
        $materiasDoProfessor = $user->materias;


        return view('professores.index', compact(['user', 'materiasDoProfessor']));
    }

   
    public function create()
    {
        return view('professores.create');
    }

   
    public function store(Request $request){
        $user = Auth::user();
        $request->validate([
            'lattes' => 'required|url', 
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->move(public_path('img/profile'), $fileName); // Salve a foto na pasta 'profile_photos'
    
            // Atualize o caminho da foto no banco de dados
            $user->image = 'img/profile/' . $fileName;
        }

    
        
        $user->lattes = $request->input('lattes');
        $user->save();

    
        return redirect()->route('professores.index')->with('success', 'Link do Lattes cadastrado com sucesso!');
    }

  
    public function show($id)
    {
        //
    }


    public function edit(Request $request, $id){

        $editType = $request->input('edit_type','');
    
        $user = Auth::user();

        return view('professores.edit', compact('user','editType'));
    }

    
    public function update(Request $request, $id) {
        $user = User::find($id);
    
        // Verifique se um arquivo de foto foi enviado
        if ($request->hasFile('image')) {
            // Apague a imagem antiga se ela existir
            if ($user->image) {
                $oldImagePath = public_path($user->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->move(public_path('img/profile'), $fileName); // Salve a foto na pasta 'profile_photos'
    
            // Atualize o caminho da foto no banco de dados
            $user->image = 'img/profile/' . $fileName;
        }
    
        // Verifique se um novo valor para 'lattes' foi enviado no formulário
        if ($request->has('lattes')) {
            $user->lattes = $request->input('lattes');
        }
    
        // Salve as atualizações no banco de dados
        $user->save();
    
        return redirect()->route('professores.index')->with('success', 'Perfil atualizado com sucesso!');
    }
    

    public function projetos(){
    
        $projetos = Projeto::all();

    
        return view('professores.projetos', compact('projetos'));

    }

    

    
    
}
