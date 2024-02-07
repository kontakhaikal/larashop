<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string customer_id
 */
class Cart extends Model
{
    use HasUuids;

    protected $table = "carts";


    function items()
    {
        return $this->hasMany(CartItem::class);
    }

    function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
