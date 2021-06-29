<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'promocode_user','promocode_id');
    }
}
