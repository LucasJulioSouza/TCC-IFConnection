<?php

namespace App\Http\Controllers;

use App\Models\materias;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('materias.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validação dos dados enviados no formulário
    $validatedData = $request->validate([
        'nome' => 'required|unique:materias|min:8', // Exemplo de validação do nome da matéria
    ]);

    // Crie uma nova instância da matéria
    $materia = new materias;

    // Preencha os campos da matéria com base nos dados do formulário
    $materia->nome = $request->input('nome'); // Substitua 'nome' pelo nome do campo no seu formulário

    // Salve a matéria no banco de dados
    $materia->save();

    // Redirecione para a página de listagem de matérias ou para onde desejar
    return redirect()->route('admin.index')->with('success', 'Matéria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\create_materias_table  $create_materias_table
     * @return \Illuminate\Http\Response
     */
    public function show(materias $materias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\create_materias_table  $create_materias_table
     * @return \Illuminate\Http\Response
     */
    public function edit(materias $materias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\create_materias_table  $create_materias_table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, materias $materias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\create_materias_table  $create_materias_table
     * @return \Illuminate\Http\Response
     */
    public function destroy(materias $materias)
    {
        //
    }
}
