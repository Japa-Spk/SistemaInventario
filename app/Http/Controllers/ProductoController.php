<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\imagenes;
use DebugBar\DebugBar;
use \stdClass;

class ProductoController extends Controller
{
    //

    public function index()
    {
        $productos = Producto::all();
        return view('productos.productos')->with(compact('productos'));
    }



    public function store(Request $request) //registra los productos
    {
        //dd($request->all());
        $validator = \Illuminate\Support\Facades\Validator::make(
            request()->all(),
            [
                'nombre' => 'required|max:30',
                'unidad_medida' => 'required|max:10',
                'valor_medida' => 'required|max:7'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
            //return redirect('/productos');
        } else {
           // return response()->json(['success'=>'Data is successfully added']);
            $producto = new Producto();
            $producto->nombre = $request->input('nombre');
            $producto->unidad_medida = $request->input('unidad_medida');
            $producto->valor_umedida = $request->input('valor_medida');
            $producto->descripcion = $request->input('descripcion');
            $producto->id_imagen = 0;
            $producto->save();
            return redirect('/productos');

        }
    }

    public function edit($id)
    {
        $producto = Producto::find($id);
        return response()->json(['producto' => $producto]);
    }


    public function update(Request $request, $id)
    {
        $validator = \Illuminate\Support\Facades\Validator::make(
            request()->all(),
            [
                'nombre' => 'required|max:30',
                'unidad_medida' => 'required|max:10',
                'valor_medida' => 'required|max:7'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
            //return redirect('/productos');
        } else {
           // return response()->json(['success'=>'Data is successfully added']);
            $producto = Producto::find($id);
            $producto->nombre = $request->input('nombre');
            $producto->unidad_medida = $request->input('unidad_medida');
            $producto->valor_umedida = $request->input('valor_medida');
            $producto->descripcion = $request->input('descripcion');
            $producto->id_imagen = 2;
            $producto->save();
            return redirect('/productos');

        }
    }

    public function eliminar($id){
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/productos');
    }


    public function img($id){
        $producto = Producto::find($id);
        $id_imagen = $producto->id_imagen;
        $imagen = imagenes::find($id_imagen);
        $path = public_path().'/images/productos/'.$imagen->link;
        return response()->json(['imagen' =>$path]);
    }

    public function saveimg(Request $request, $id){
        $file = $request->file('file');
        $path = public_path(). '/images/productos';
        $filename = $file->getClientOriginalName();
        $filetype = $file->getType();
        $filesize = $file->getSize()*pow(10,-6);
        $file->move($path, $filename);
        
        $imagen = new imagenes();
        $imagen->link = $filename;
        $imagen->tamaño = $filesize;
        $imagen->tipo = $filetype;
        $imagen->save();
        $producto = Producto::find($id);
        $producto->id_imagen = $imagen->id;
        $producto->save();
        return redirect('/productos');
    }


}
