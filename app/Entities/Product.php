<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public      $timestamps     = true;
    protected   $table          = 'products';
    protected   $fillable       = ['instituition_id', 'name', 'description', 'index', 'interest_rate'];

    public function instituition()
    {
        return $this->belongsTo(Instituition::class);
    }
}
