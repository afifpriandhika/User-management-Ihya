<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'name_product',
        'unit',
        'price',
        'duration_contract',
        'period_margin',
        'margin',
        'tag',
        'detail',
        'status',
        'image',
        'verified'
    ];
    
    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    
    public function rating()
    {
        return $this->hasMany('App\Models\Rating');
    }
}
