<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id','carpeta_id','medida_id','color_id','cantidadmedalla','cantidadcarpeta','producto_id','fechaentrega','estado'];
    
    protected $table = 'orders';


    public function products()
    {
    	return $this->belongsToMany(Producto::class);
    }

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
    public function producto()
    {
        return $this->belongsToMany('App\Models\Producto', 'producto_id');

    }
}
