<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventario;
use App\Provedor;
use App\Producto;
use DebugBar\DebugBar;
use \stdClass;

class InventarioController extends Controller
{
    //

    public function index()
    {
        $inventarios = Inventario::all();
        $provedores = Provedor::all();
        $productos = Producto::all();
        return view('inventarios.inventarios')->with(compact('inventarios'));
    }



    public function store(Request $request) //registra los provedores
    {
        //dd($request->all());
        $validator = \Illuminate\Support\Facades\Validator::make(
            request()->all(),
            [
                'cantidad' => 'required|max:10',
                'valor_unitario' => 'required|max:30'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
            //return redirect('/provedores');
        } else {
           // return response()->json(['success'=>'Data is successfully added']);
            $inventario = new Inventario();
            $inventario->producto_id = $request->input('producto_id');
            $inventario->cantidad = $request->input('cantidad');
            $inventario->valor_unitario = $request->input('valor_unitario');
            $inventario->provedor_id = $request->input('provedor_id');
            $inventario->save();
            return redirect('/inventarios');

        }
    }

    public function edit($id)
    {
        $inventario = Inventario::find($id);
        return response()->json(['inventario' => $inventario]);
    }


    public function update(Request $request, $id)
    {
        $validator = \Illuminate\Support\Facades\Validator::make(
            request()->all(),
            [
                'cantidad' => 'required|max:10',
                'valor_unitario' => 'required|max:30'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
            //return redirect('/provedores');
        } else {
           // return response()->json(['success'=>'Data is successfully added']);
            $inventario = Inventario::find($id);
            $inventario->producto_id = $request->input('producto_id');
            $inventario->cantidad = $request->input('cantidad');
            $inventario->valor_unitario = $request->input('valor_unitario');
            $inventario->provedor_id = $request->input('provedor_id');
            $inventario->save();
            return redirect('/inventarios');

        }
    }

    public function eliminar($id){
        $inventario = Inventario::find($id);
        $inventario->delete();
        return redirect('/inventarios');
    }



}
