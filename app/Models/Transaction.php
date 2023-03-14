<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    
    // CHARITY
    public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function user_portofolio()
	{
		return $this->belongsTo(Userdonation::class);
	}

	public function proyek_batch()
	{
		return $this->belongsTo(ProyekBatch::class);
	}
	public function user_donation()
	{
		return $this->belongsTo(UserDonation::class);
	}
	public function waktuTarikDana(){
		$time = Carbon::parse(Carbon::now())->diffForHumans($this->created_at,true) . ' yang lalu';
		return $time;
	}
	
    //INVEST
    public function portfolio()
    {
        return $this->belongsTo('App\Models\Portfolio','portfolio_id');
    }
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }
}
