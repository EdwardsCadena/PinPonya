<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponse; 
use App\Models\Partidos; 

class PartidosController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidos = Partidos::all();
        return $this->successResponse($partidos);
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
        $rule=[
            'FKJugador1'=>'required',
            'FkJugador2'=>'required',
            'FkJuez'=>'required',
            'Marcador'=>'required|max:155',
            'Comentario'=>'max:255',
        ];
        $this->validate($request,$rule);
        $partidos = Partidos::create($request->all());
        return $this->successResponse($partidos, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partidos = Partidos::findOrFail($id);
        return $this->successResponse($partidos);
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
        $rule=[
            'FKJugador1'=>'required',
            'FkJugador2'=>'required',
            'FkJuez'=>'required',
            'Marcador'=>'required|max:155',
            'Comentario'=>'max:255',
        ];
        $this->validate($request,$rule);
        $partidos = Partidos::findOrFail($id);
        $partidos->fill($request->all());
        if($partidos->isClean()){
            return $this->errorResponse('Al menos un valor debe cambiar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $partidos->save();
        return $this->successResponse($partidos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $partidos = Partidos::findOrFail($id);
        $partidos->delete();
        return $this->successResponse($partidos);
    }
}
