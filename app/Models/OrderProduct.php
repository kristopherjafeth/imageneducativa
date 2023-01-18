<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_producto';


    protected $fillable = ['producto_id','order_id','quantity','estado'];


    public function producto()
    {
        // return $this->belongsToMany('App\Models\Producto', 'producto_id');
        // return $this->belongsToMany(Producto::class);
        return $this->hasOne('App\Models\Producto', 'id', 'producto_id');


    }

    public function grado()
    {
        return $this->hasOne('App\Models\Grado', 'id', 'grado_id');
    }

}
