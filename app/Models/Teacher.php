<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'school_id', 'password',
    ];

    protected $hidden = [
        'password'
    ];

	public function findForPassport($username) {
		return $this->where('school_id', $username)->first();
	}
}
