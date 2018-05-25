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
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public static function boot()
    {
		$recalculate = function($model){
			$idpedido = $model->idpedido;
			$pedido = Pedidos::find($idpedido);
			if($pedido){
				$costo_total = 0;
				$articulos = Detalle_pedido::where('idpedido', $idpedido)
					->get();
				foreach($articulos as $item){
					if ($item->cantidad_productos > 0){
						$costo_total = $costo_total + ($item->cantidad_productos * $item->producto->precio);
					}
				}
				$pedido->costo = $costo_total;
				$pedido->save();
				
			}
			//if ($costo_total > 0){
			//}
				
		};
		static::created($recalculate);
		static::updated($recalculate);
		static::deleted($recalculate);
    }	
	
}
