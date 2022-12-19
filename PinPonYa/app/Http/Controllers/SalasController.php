<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponse; 
use App\Models\Salas; 

class SalasController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Salas::all();
        return $this->successResponse($salas);
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
            'FkHotel'=>'required',
            'Capacidad'=>'required',
            'MediosComunicacion'=>'required|max:255',
        ];
        $this->validate($request,$rule);
        $salas = Salas::create($request->all());
        return $this->successResponse($salas, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salas = Salas::findOrFail($id);
        return $this->successResponse($salas);
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
            'FkHotel'=>'required',
            'Capacidad'=>'required',
            'MediosComunicacion'=>'required|max:255',
        ];
        $this->validate($request,$rule);
        $salas = Salas::findOrFail($id);
        $salas->fill($request->all());
        if($salas->isClean()){
            return $this->errorResponse('Al menos un valor debe cambiar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $salas->save();
        return $this->successResponse($salas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salas = Salas::findOrFail($id);
        $salas->delete();
        return $this->successResponse($salas);
    }
}
