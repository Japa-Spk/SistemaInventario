<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    //
    public function producto(){
        return $this->belongsTo(Producto::class);
    }
    public function provedor(){
        return $this->belongsTo(Provedor::class);
    }
}
