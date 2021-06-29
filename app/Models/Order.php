<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function promocode()
    {
        return $this->belongsTo(PromoCode::class,'promocode_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'order_product')->withPivot('quantity');
    }
    public function paymentmethod()
    {
        return $this->belongsTo(Paymentmethod::class);
    }
}
