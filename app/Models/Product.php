<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    use Sluggable;
    protected $dates = ['deleted_at'];
    protected $extends = [
        'rating',
        'discount_percentage',
        'discount_flag',
        'discount',
        'net_price'
    ];
    protected $guarded = [];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function getRatingAttribute()
    {
        return $this->ratings->avg('rating');
    }
    public function getDiscountFlagAttribute()
    {
        if($this->discount_amount) {
            return true;
        }
        else {
            return false;
        }
    }
    public function getDiscountPercentageAttribute()
    {
        if($this->discount_flag)
        {
            if($this->discount_type == 'flat')
            {
                return round((($this->discount_amount/$this->price)*100),2);
            }
            elseif($this->discount_type == 'percentage')
            {
                return $this->discount_amount;
            }
        }
        else
        return null;
    }
    public function getDiscountAttribute()
    {
        if($this->discount_flag)
        {
            if($this->discount_type == 'flat')
            {
                return $this->discount_amount;
            }
            elseif($this->discount_type == 'percentage')
            {
                return round(($this->price*$this->discount_amount/100),2);
            }
        }
        else
        return null;
    }
    public function getNetPriceAttribute()
    {
        return $this->price-$this->discount;
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
