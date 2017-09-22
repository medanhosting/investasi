<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'id',
        'email',
        'password',
        'first_name',
        'last_name',
        'username',
        'identity_number',
        'dob',
        'gender',
        'phone',
        'status_id',
        'email_token',
        'phone_token',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
        'email_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'email_token'
    ];
}
