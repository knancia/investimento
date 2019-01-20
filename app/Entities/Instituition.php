<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


/**
 * Class Instituition.
 *
 * 
 * 
 * @package namespace App\Entities;
 */
class Instituition extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes; //Aparece somente na video aula
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public      $timestamps     = true;
    protected   $table          = 'instituitions';
    protected   $fillable       = ['name'];


    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
