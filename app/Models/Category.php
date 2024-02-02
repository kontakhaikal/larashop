<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use HasUuids;

    protected $table = 'categories';

    protected $fillable = ['name'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category', 'category_id', 'product_id');
    }
}
