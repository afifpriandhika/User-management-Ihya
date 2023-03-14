<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table = 'user_profiles';

	protected $casts = [
		'user_id' => 'int'
	];
	protected $fillable = [
		'user_id',
		'ktp_name',
		'nik',
		'job',
		'job_detail',
        'social_media',
        'social_link',
        'birthplace',
        'birthdate',
        'phone',
        'ktp_scan',
        'ktp_selfie',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'address_detail',
        'id_approval',
        'rejection_note'
        
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
