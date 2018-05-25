<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table= User::all();
        //dd($table);
        return view('user.index',[
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
        return view('user.create',[
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

        $table = new User;
        $table->name=$request->name;
        $table->email=$request->email;
		$table->password=\Hash::make(
		$request->password);
        $table->save();
        return redirect()->route("user_index");
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
        $table = User::find($id);
        return view('user.create',[
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

        $table = User::find($id);
        $table->name=$request->name;
        $table->email=$request->email;
		$table->password=\Hash::make(
		$request->password);
        $table->save();
        return redirect()->route("user_index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = User::find($id);
        $table->delete();
        return redirect()->route("user_index");
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

            "name"=>"required"
            , "email"=>"required|email"
			, "password"=>"required|confirmed"

            

        ];
    }
}
