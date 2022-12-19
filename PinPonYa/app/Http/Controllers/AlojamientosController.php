<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponse; 
use App\Models\Alojamientos; 


class AlojamientosController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alojamiento = Alojamientos::all();
        return $this->successResponse($alojamiento);
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
            'FechaInicio'=>'required',
            'FechaFin'=>'required',
        ];
        $this->validate($request,$rule);
        $alojamiento = Alojamientos::create($request->all());
        return $this->successResponse($alojamiento, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alojamiento = Alojamientos::findOrFail($id);
        return $this->successResponse($alojamiento);
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
            'FechaInicio'=>'required',
            'FechaFin'=>'required',
        ];
        $this->validate($request,$rule);
        $alojamiento = Alojamientos::findOrFail($id);
        $alojamiento->fill($request->all());
        if($alojamiento->isClean()){
            return $this->errorResponse('Al menos un valor debe cambiar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $alojamiento->save();
        return $this->successResponse($alojamiento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alojamiento = Alojamientos::findOrFail($id);
        $alojamiento->delete();
        return $this->successResponse($alojamiento);
    }
}
