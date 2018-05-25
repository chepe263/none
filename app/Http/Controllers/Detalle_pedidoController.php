<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle_pedido;

class Detalle_pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table= Detalle_pedido::all();
        //dd($table);
        return view('detalle_pedido.index',[
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
        return view('detalle_pedido.create',[
            "editar"=>false,
            "listausuarios"=> [] 
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

        $table = new Detalle_pedido;
        $table->iddetalle_pedido=$request->iddetalle_pedido;
        $table->idpedido=$request->idpedido;
		$table->idproducto=$request->idproducto;
		$table->cantidad_productos=$request->cantidad_productos;
        $table->save();
        return redirect()->route("detalle_pedido_index");
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
        $table = Detalle_pedido::find($id);
        return view('detalle_pedido.create',[
            "editar"=>true
            ,"data"=>$table
            ,"listausuarios"=> [] 
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

        $table = Detalle_pedido::find($id);
       $table->iddetalle_pedido=$request->iddetalle_pedido;
        $table->idpedido=$request->idpedido;
		$table->idproducto=$request->idproducto;
		$table->cantidad_productos=$request->cantidad_productos;
        $table->save();
        return redirect()->route("detalle_pedido_index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Detalle_pedido::find($id);
        $table->delete();
        return redirect()->route("detalle_pedido_index");
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

            "cantidad_productos"=>"required"
            

            

        ];
    }
}
