<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $category_id
 * @property $name
 * @property $describtion
 * @property $image
 * @property $price
 * @property $reseller_price
 * @property $reseller_comission
 * @property $stock
 * @property $status
 * @property $created_at
 * @property $updated_at
 *
 * @property Sale[] $sales
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    use HasUuids;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['category_id', 'name', 'describtion', 'image', 'price', 'reseller_price', 'reseller_comission', 'stock', 'status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sales()
    {
        return $this->hasMany(\App\Models\Sale::class, 'id', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }
    
}
