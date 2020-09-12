<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 * @method static create($array)
 */
class Product extends Model
{
    protected $fillable = ['title', 'cost'];
}
