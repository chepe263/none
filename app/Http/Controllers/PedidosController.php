<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedidos;
use App\Clientes;
use App\Estado;
use DB;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table= Pedidos::all();
        //dd($table);
        return view('pedidos.index',[
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
		$clientes = Clientes::all()->pluck("nombre_compania", "idclientes");
		$estados = Estado::all()->pluck("nombre", "idestados");
        return view('pedidos.create',[
            "editar"=>false
			,"lista_clientes"=> $clientes
			,"lista_estados"=> $estados
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

        $table = new Pedidos;
        $table->idpedidos=$request->idpedidos;
        $table->idcliente=$request->idcliente;
		$table->costo=0; //$request->costo;
		$table->idestado= $request->idestado;
		$table->costo_envio= 25; //$request->costo_envio;
        $table->save();
        return redirect()->route("pedidos_index");
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
        $table = Pedidos::find($id);
		$clientes = Clientes::all()->pluck("nombre_compania", "idclientes");
		$estados = Estado::all()->pluck("nombre", "idestados");
        return view('pedidos.create',[
            "editar"=>true
            ,"data"=>$table
            ,"lista_clientes"=> $clientes
			,"lista_estados"=> $estados
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

        $table = Pedidos::find($id);
        //$table->idpedidos=$request->idpedidos;
        $table->idcliente=$request->idcliente;
		//$table->costo=$request->costo;
		$table->idestado=$request->idestado;
		$table->costo_envio=$request->costo_envio;
        $table->save();
        return redirect()->route("pedidos_index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Pedidos::find($id);
        $table->delete();
        return redirect()->route("pedidos_index");
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

            //"costo"=>"required"
             "costo_envio"=>"required|numeric"
		

            

        ];
    }
}
