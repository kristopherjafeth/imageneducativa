<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carpeta
 *
 * @property $id
 * @property $nombrecarpeta
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Carpeta extends Model
{
    
    static $rules = [
		'nombrecarpeta' => 'required',

    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombrecarpeta'];

   

}
