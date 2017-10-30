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
        'id' => 'string',
        'address_latitude' => 'float',
        'address_longitude' => 'float',
        'wallet_amount' => 'float',
        'investme_point' => 'float'
    ];

    protected $fillable = [
        'id',
        'email',
        'password',
        'first_name',
        'last_name',
        'username',
        'address_latitude',
        'address_longitude',
        'wallet_amount',
        'investme_point',
        'income',
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
        'email_token',
        'username'
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

    public function getWalletAmountAttribute(){
        return number_format($this->attributes['wallet_amount'],0, ",", ".");
    }

    public function getInvestmePointAttribute(){
        return number_format($this->attributes['investme_point'],0, ",", ".");
    }

    public function getIncomeAttribute(){
        return number_format($this->attributes['income'],0, ",", ".");
    }

}
