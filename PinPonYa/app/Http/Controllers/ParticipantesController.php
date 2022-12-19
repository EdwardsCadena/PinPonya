<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponse; 
use App\Models\Participantes; 

class ParticipantesController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participantes = Participantes::all();
        return $this->successResponse($participantes);
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
            'Nombre'=>'required|max:55',
            'Direccion'=>'required|max:55',
            'Telefonos'=>'required',
            'CampeonatosJugador'=>'required',
            'CampeonatosJuez'=>'required',
            'NivelJuego'=>'required',
        ];
        $this->validate($request,$rule);
        $participantes = Participantes::create($request->all());
        return $this->successResponse($participantes, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participantes = Participantes::findOrFail($id);
        return $this->successResponse($participantes);
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
            'Nombre'=>'required|max:55',
            'Direccion'=>'required|max:55',
            'Telefonos'=>'required',
            'CampeonatosJugador'=>'required',
            'CampeonatosJuez'=>'required',
            'NivelJuego'=>'required',
        ];
        $this->validate($request,$rule);
        $participantes = Participantes::findOrFail($id);
        $participantes->fill($request->all());
        if($participantes->isClean()){
            return $this->errorResponse('Al menos un valor debe cambiar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $participantes->save();
        return $this->successResponse($participantes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participantes = Participantes::findOrFail($id);
        $participantes->delete();
        return $this->successResponse($participantes);
    }
}
