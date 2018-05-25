<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $primaryKey = "idpedidos";
	
    /**
     * se obtiene el usuario relacionado
     */
    public function cliente()
    {
        return $this->hasOne('App\Clientes','idclientes', 'idcliente');
    }
	
    public function estado()
    {
        return $this->hasOne('App\Estado','idestados', 'idestado');
    }	
	
    public function detalle()
    {
        return $this->hasMany('App\Detalle_pedido','idpedido', 'idpedidos');
    }
	
	public static function boot()
    {
		static::deleted(function($model){
			$articulos = Detalle_pedido::where('idpedido', $model->idpedidos)
					->get();
			foreach($articulos as $item){
				$item->delete();
			}
		});
	}
	
}
