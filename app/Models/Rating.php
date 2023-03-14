<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    
    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function products()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
