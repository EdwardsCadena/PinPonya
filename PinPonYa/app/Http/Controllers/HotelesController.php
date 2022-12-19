<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponse; 
use App\Models\Hoteles; 

class HotelesController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoteles = Hoteles::all();
        return $this->successResponse($hoteles);
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
            'Telefonos'=>'required|max:75',
        ];
        $this->validate($request,$rule);
        $hoteles = Hoteles::create($request->all());
        return $this->successResponse($hoteles, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hoteles = Hoteles::findOrFail($id);
        return $this->successResponse($hoteles);
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
            'Telefonos'=>'required|max:75',
        ];
        $this->validate($request,$rule);
        $hoteles = Hoteles::findOrFail($id);
        $hoteles->fill($request->all());
        if($hoteles->isClean()){
            return $this->errorResponse('Al menos un valor debe cambiar', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $hoteles->save();
        return $this->successResponse($hoteles);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hoteles = Hoteles::findOrFail($id);
        $hoteles->delete();
        return $this->successResponse($hoteles);
    }
}
