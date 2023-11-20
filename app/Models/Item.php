<?php

namespace App\Models;

use App\Models\CartItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'item_id';

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'item_id');
    }
}
