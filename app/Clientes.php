<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    protected $primaryKey = "idclientes";

        /**
     * se obtiene el usuario relacionado
     */
    /*public function user()
    {
        return $this->hasOne('App\User','id', 'idusuario');
    }*/
}
