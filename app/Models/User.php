<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected function role(): Attribute
    {
        return new Attribute(
            // get: fn ($value) =>  ["0", "1", "2"][$value],
            get: fn ($value) =>  ["admin", "owner", "user"][$value],
        );

    }
    
    
    // CHARITY
    public function donations()
	{
		return $this->hasMany(UserDonation::class);
	}

	public function profile()
	{
		return $this->hasOne(UserProfile::class, 'user_id');
	}
    public function proyek_owner(){
        return $this->hasOne(ProyekOwner::class, 'user_id');
    }
    
    public function getPhotoProfile()
	{
		return (empty($this->photo_profile) ? asset('img/default-profile.png'):asset('storage/images/profiles/'.$this->photo_profile));
	}
	
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    
    // INVEST
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function portfolios()
    {
        return $this->hasMany('App\Models\Portfolio');
    } 	
}
