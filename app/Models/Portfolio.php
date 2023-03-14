<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    
    protected $dates = ['contract_end'];

    public function products()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
    
    public function transactions()
    {
        return $this->belongsTo('App\Models\Transaction','transaction_id');
    }
}
