<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orientacao;
use App\Models\User;
use App\Models\Documento;
use App\Models\Reuniao;
use Illuminate\Database\Eloquent\Collection;
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


        if ($typeUserId === 1) {
            $orientacoes = Orientacao::with('projeto')->where('professor_id', $userId)->where('status', 'aceita')->get();
        } elseif ($typeUserId === 2) {
            $orientacoes = Orientacao::with('projeto')->where('aluno_id', $userId)->where('status', 'aceita')->get();
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





}
