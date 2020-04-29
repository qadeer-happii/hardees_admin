<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $append = [
		'name'
	];
	
    protected $fillable = [
        'username',
		'first_name',
		'last_name',
		'dob',
		'device_token',
		'email',
		'password',
		'address',
		'phone_number',
		'latitude',
		'longitude',
		'device_type',
		'device_id',
		'device_name',
		'app_version',
		'language_code',
		'cnic',
		'cnic_expire_date',
		'city_id',
		'state_id',
		'country_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
	
	public function getNameAttribute()
	{
		return $this->first_name . " " . $this->last_name;
	}
	
	public function getPoints()
	{
		return 1500;
	}
}
