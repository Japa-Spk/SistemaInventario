<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provedor extends Model
{
    //
    protected $table = 'provedores';
    public function inventarios(){
        return $this->hasMany(Inventario::class);
    }
}
