<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detalle_pedido;
use App\Productos;

class Detalle_pedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idpedidos)
    {
        $table= Detalle_pedido::where('idpedido', $idpedidos)->get();
        //dd($table);
        return view('detalle_pedido.index',[
            "data"=>$table
			,'idpedidos' => $idpedidos
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idpedidos)
    {
		$listaproducto = Productos::all()->pluck("nombre", "idproductos");
        return view('detalle_pedido.create',[
            "editar"=>false,
            "listaproducto"=> $listaproducto 
			,'idpedidos' => $idpedidos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idpedidos
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idpedidos)
    {
        $validatedData = $request->validate(
            $this->validationRules()
        );

        $table = new Detalle_pedido;
        $table->idpedido=$idpedidos;
		$table->idproducto=$request->idproducto;
		$table->cantidad_productos=$request->cantidad_productos;
        $table->save();
        return redirect()->route("detalle_pedido_index", ['idpedidos' => $idpedidos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idpedidos
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idpedidos, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $idpedidos
     * @return \Illuminate\Http\Response
     */
    public function edit($idpedidos, $id)
    {
        $table = Detalle_pedido::find($id);
		$listaproducto = Productos::all()->pluck("nombre", "idproductos");
        return view('detalle_pedido.create',[
            "editar"=>true
            ,"data"=>$table
            ,"listaproducto"=> $listaproducto 
			,'idpedidos' => $idpedidos
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $idpedidos
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($idpedidos, $id,Request $request )
    {
        $validatedData = $request->validate(
            $this->validationRules()
        );

        $table = Detalle_pedido::find($id);
        //$table->idpedido=$request->idpedido;
		$table->idproducto=$request->idproducto;
		$table->cantidad_productos=$request->cantidad_productos;
        $table->save();
        return redirect()->route("detalle_pedido_index", ['idpedidos' => $idpedidos]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpedidos,$id)
    {
        $table = Detalle_pedido::find($id);
        $table->delete();
        return redirect()->route("detalle_pedido_index", ['idpedidos' => $idpedidos]);
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

            "cantidad_productos"=>"required|numeric|min:1"
            

            

        ];
    }
	
}
