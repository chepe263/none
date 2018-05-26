<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clientes;
use App\User;
use App\Pedidos;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clientes()
    {
        $table= Clientes::all();
        //dd($table);
        return view('reportes.clientes',[
            "data"=>$table
        ]);
    }

    public function pedidos($estado = "all")
    {
        $table= Pedidos::all();
        //dd($table);
        return view('reportes.pedidos',[
            "data"=>$table

        ]);
    }
}
