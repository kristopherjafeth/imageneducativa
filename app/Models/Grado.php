<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Grado
 *
 * @property $id
 * @property $nombregrado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Grado extends Model
{
    
    static $rules = [
		'nombregrado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombregrado'];



}
