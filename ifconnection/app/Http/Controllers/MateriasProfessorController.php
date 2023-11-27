<?php

namespace App\Http\Controllers;
use App\Models\Materia;
use App\Models\User;
use App\Models\materias_professor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MateriasProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
     {
         
         $user = Auth::user();
     
         
         $materias = Materia::all();
     
         return view('materiasProfessor.create', compact('user', 'materias'));
     }
     
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

     public function store(Request $request)
     {
         $professor_id = Auth::user()->id;
         $materiasSelecionadas = $request->input('materias');
     
         // Verifique as matérias selecionadas e evite duplicações
         foreach ($materiasSelecionadas as $materia_id) {
             $existente = materias_professor::where('user_id', $professor_id)
                 ->where('materia_id', $materia_id)
                 ->first();
     
             if (!$existente) {
                 materias_professor::create([
                     'user_id' => $professor_id,
                     'materia_id' => $materia_id,
                 ]);
             }
         }
     
         return redirect()->route('professores.index')->with('success', 'Matérias associadas com sucesso.');
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\materias_professor  $materias_professor
     * @return \Illuminate\Http\Response
     */
    public function show(materias_professor $materias_professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\materias_professor  $materias_professor
     * @return \Illuminate\Http\Response
     */
    public function edit($userId)
    {
    $user = User::find($userId);

    
    $materias = Materia::all();

    return view('materiasProfessor.edit', compact('user', 'materias'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\materias_professor  $materias_professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
    // Recupere o professor com base no ID do usuário
    $user = User::find($userId);

    // Valide os dados do formulário, se necessário
    $request->validate([
        'materias' => 'array', // Certifique-se de que 'materias' seja um array
    ]);

    // Matérias selecionadas no formulário
    $materiasSelecionadas = $request->input('materias', []);

    // Associe as matérias selecionadas ao professor
    $user->materias()->sync($materiasSelecionadas);

    return redirect()->route('professores.index')->with('success', 'Matérias atualizadas com sucesso');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\materias_professor  $materias_professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(materias_professor $materias_professor)
    {
        //
    }
}
