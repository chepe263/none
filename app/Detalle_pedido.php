<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_pedido extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $primaryKey = "iddetalle_pedido";
	protected $table = "detalle_pedido";
	
    /**
     * se obtiene el usuario relacionado
     */
    public function producto()
    {
        return $this->hasOne('App\Productos','idproductos', 'idproducto');
    }
}
