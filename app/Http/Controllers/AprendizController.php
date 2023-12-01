<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Error;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprendices=Aprendiz::all();
        return view('aprendices.index',compact('aprendices'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            "nombre_aprendiz" => "required|min:8",
            "n_documento" =>  "required|unique:aprendices,n_documento",
            "n_ficha" => "required|min:6",
            "nombre_ficha"=>"required",
            "telefono" => "required|min:10",
            "correo" => "required",
            "direccion" => "required",
            "created_at"=> now()
        ]);
        Aprendiz::insert($validate);
        return back()->with("mensaje",["type"=>"success","title"=>"Se registro exitosamente"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    //     try {
    //     $validate=$request->validate([
    //         "nombre_aprendiz" => "required|min:8",
    //         "n_documento" =>  "required",
    //         "n_ficha" => "required|min:6",
    //         "nombre_ficha"=>"required",
    //         "telefono" => "required|min:9",
    //         "correo" => "required",
    //         "direccion" => "required",
    //         // "updated_at"=> now()
    //     ]);
    //     Aprendiz::where("id","=",$id)->update($validate);
    //     return back()->with("mensaje",["type"=>"success","title"=>"Se actualizo exitosamente"]);
    // } catch (Error $error) {
    //     return back()->with("mensaje",["type"=>"danger","title"=>"oops! nos salio este error: $error"]);
    // };
        // return $id;
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Aprendiz::where("id","=",$id)->delete();
        return back()->with("mensaje",["type"=>"success","title"=>"Se elimino exitosamente"]);
        // return $id;
    }
}
