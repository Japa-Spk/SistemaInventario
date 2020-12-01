<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagenes extends Model
{
    //
    public function productos(){
        return $this->hasMany(Producto::class);
    }
    public $timestamps = false;
}
