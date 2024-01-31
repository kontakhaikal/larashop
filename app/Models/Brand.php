<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Product;

class Brand extends Model
{
    use HasUuids;

    protected $table = 'brands';

    protected $fillable = ['name'];


    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
