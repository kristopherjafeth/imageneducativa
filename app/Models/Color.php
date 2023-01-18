<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Color
 *
 * @property $id
 * @property $nombrecolor
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Color extends Model
{
    
    static $rules = [
		'nombrecolor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombrecolor'];

      //Relationships Many to Many
      public function carpetas(){
        return $this->belongsToMany('App\Models\Carpeta', 'carpeta_color');
      }

}
