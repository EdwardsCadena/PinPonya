<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponse; 
use App\Models\Ciudades; 

class CiudadesController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ciudades = Ciudades::all();
        return $this->successResponse($ciudades);
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
            'numeroclubes'=>'required',
        ];
        $this->validate($request,$rule);
        $ciudades = Ciudades::create($request->all());
        return $this->successResponse($ciudades, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ciudades = Ciudades::findOrFail($id);
        return $this->successResponse($ciudades);
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
            'numeroclubes'=>'required',
        ];
        $this->validate($request,$rule);
        $ciudades = Ciudades::findOrFail($id);
        $ciudades->fill($request->all());
        if($ciudades->isClean()){
            return $this->errorResponse('Al menos un valor debe cambiar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $ciudades->save();
        return $this->successResponse($ciudades);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciudades = Ciudades::findOrFail($id);
        $ciudades->delete();
        return $this->successResponse($ciudades);
    }
}
