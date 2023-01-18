<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 *
 * @property $id
 * @property $cliente_id
 * @property $carpeta_id
 * @property $medida_id
 * @property $color_id
 * @property $cantidad
 * @property $producto_id
 * @property $fechaentrega
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property Carpeta $carpeta
 * @property Cliente $cliente
 * @property Color $color
 * @property Medida $medida
 * @property Producto $producto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pedido extends Model
{
    
    static $rules = [
		'cliente_id' => 'required',
		'estado' => 'required',
    ];

    protected $perPage = 20;

  
    protected $fillable = ['cliente_id','carpeta_id','medida_id','color_id','cantidad','producto_id','fechaentrega','estado'];



    public function carpeta()
    {
        return $this->hasOne('App\Models\Carpeta', 'id', 'carpeta_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cliente()
    {
        return $this->hasOne('App\Models\Cliente', 'id', 'cliente_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function color()
    {
        return $this->hasOne('App\Models\Color', 'id', 'color_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medida()
    {
        return $this->hasOne('App\Models\Medida', 'id', 'medida_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto(){
      return $this->belongsToMany('App\Models\Producto', 'pedido_producto');
    }


    public function products()
    {
    	return $this->belongsToMany(Pedidosotro::class);
    }

    

}
