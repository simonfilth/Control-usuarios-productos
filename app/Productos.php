<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'productos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'codigo', 'imagen','precio','cantidad','descripcion', 'categoria_id'];

    public function setImagenAttribute($value){
        if(!empty($value)){
            $this->attributes['imagen']=$value->getClientOriginalName();
        }
    }


    public function scopeValor($query,$valor,$select){
         
        /*if($select=="categoria_id"){
            if($valor=="Administrador"){
                $valor=1;
            }
            else{
                $valor=2;
            }
        }*/
        if(trim($valor)!=""){
            $query->where($select,"LIKE","%$valor%");
        }      
    }
}
