<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\User;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table= Clientes::all();
        //dd($table);
        return view('clientes.index',[
            "data"=>$table
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listausuarios = User::all()->pluck('name','id');
        return view('clientes.create',[
            "editar"=>false,
            "listausuarios"=> $listausuarios 
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            $this->validationRules()
        );

        $table = new Clientes;
        $table->telefono=$request->telefono;
        $table->direccion=$request->direccion;
		$table->nombre_compania=$request->nombre_compania;
        $table->save();
        return redirect()->route("clientes_index");
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
        $table = Clientes::find($id);

        $listausuarios = User::all()->pluck('name','id');
        return view('clientes.create',[
            "editar"=>true
            ,"data"=>$table
            ,"listausuarios"=> $listausuarios
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request )
    {
        $validatedData = $request->validate(
            $this->validationRules()
        );

        $table = Clientes::find($id);
        $table->telefono=$request->telefono;
        $table->direccion=$request->direccion;
        $table->nombre_compania=$request->nombre_compania;
        $table->idusuario=$request->idusuario;
        $table->save();
        return redirect()->route("clientes_index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Clientes::find($id);
        $table->delete();
        return redirect()->route("clientes_index");
    }

    
    /**
     * Devuelve conjunto de reglas para validaciones
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function validationRules() 
    {
        return [

            "telefono"=>"required"
            , "direccion"=>"required"
			, "nombre_compania"=>"required"

            

        ];
    }
}
