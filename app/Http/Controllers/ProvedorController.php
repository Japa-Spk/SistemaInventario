<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provedor;
use DebugBar\DebugBar;
use \stdClass;

class ProvedorController extends Controller
{
    //

    public function index()
    {
        $provedores = Provedor::all();
        return view('provedores.provedores')->with(compact('provedores'));
    }



    public function store(Request $request) //registra los provedores
    {
        //dd($request->all());
        $validator = \Illuminate\Support\Facades\Validator::make(
            request()->all(),
            [
                'nombre' => 'required|max:30',
                'direccion' => 'required|max:30',
                'telefono' => 'required|max:12',
                'marca' => 'required|max:25'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
            //return redirect('/provedores');
        } else {
           // return response()->json(['success'=>'Data is successfully added']);
            $provedor = new Provedor();
            $provedor->nombre = $request->input('nombre');
            $provedor->direccion = $request->input('direccion');
            $provedor->telefono = $request->input('telefono');
            $provedor->marca = $request->input('marca');
            $provedor->save();
            return redirect('/provedores');

        }
    }

    public function edit($id)
    {
        $provedor = Provedor::find($id);
        return response()->json(['provedor' => $provedor]);
    }


    public function update(Request $request, $id)
    {
        $validator = \Illuminate\Support\Facades\Validator::make(
            request()->all(),
            [
                'nombre' => 'required|max:30',
                'direccion' => 'required|max:30',
                'telefono' => 'required|max:12',
                'marca' => 'required|max:25'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
            //return redirect('/provedores');
        } else {
           // return response()->json(['success'=>'Data is successfully added']);
            $provedor = Provedor::find($id);
            $provedor->nombre = $request->input('nombre');
            $provedor->direccion = $request->input('direccion');
            $provedor->telefono = $request->input('telefono');
            $provedor->marca = $request->input('marca');
            $provedor->save();
            return redirect('/provedores');

        }
    }

    public function eliminar($id){
        $provedor = Provedor::find($id);
        $provedor->delete();
        return redirect('/provedores');
    }



}
