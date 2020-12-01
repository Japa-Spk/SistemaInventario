<?php

namespace App\Http\Controllers;
use App\Producto;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productos = Producto::all();
        return view('tienda.tienda')->with(compact('productos'));
    }
}
