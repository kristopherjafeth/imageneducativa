<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidosotro extends Model
{
    use HasFactory;

    protected $fillable = [
        'item',
        'pedido_id',
        'description',
        'cantidadproducto',
 
    ];
    protected $connection = "mysql";

    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'producto_id');
    }
}
