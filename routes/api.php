<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Empleado;



Route::get('empleados' , function () {
    $empleados = Empleado::get();
    return $empleados;
});
Route::post('empleados',function(Request $request){

    $request->validate([
 
        'nombre'=>'required|max:50',
        'apellido'=>'required|max:50',
        'cedula'=>'required|max:50',
        'email'=>'required|max:50|email|unique:empleados',
        'lugar_nacimineto'=>'required|max:50',
        'sexo'=>'required|max:50',
        'estado_civil'=>'required|max:50',
        'telefono'=>'required|numeric',


    ]);

    $empleado = new Empleado;
    $empleado->nombre=$request->input('nombre');
    $empleado->apellido=$request->input('apellido');
    $empleado->cedula=$request->input('cedula');
    $empleado->email=$request->input('email');
    $empleado->lugar_nacimineto=$request->input('lugar_nacimineto');
    $empleado->sexo=$request->input('sexo');
    $empleado->estado_civil=$request->input('estado_civil');
    $empleado->telefono=$request->input('telefono');
    $empleado->save();
    return "Empleado creado correctamente";
});


Route::put('empleados/{id}', function(Request $request, $id){
    $empleado = Empleado::findOrfall($id);
    return $empleado;
});

