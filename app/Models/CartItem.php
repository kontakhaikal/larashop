<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int quantity
 */
class CartItem extends Model

{
    protected $table = "cart_items";

    function product()
    {
        return $this->hasOne(Product::class);
    }

    function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
