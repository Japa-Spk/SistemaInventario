<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    public function imagen(){
        return $this->belongsTo(imagenes::class);
    }
    protected $fillable = ['nombre', 'unidad_medida', 'valor_umedida', 'descripcion','id_imagen'];
    public $timestamps = false;
}
