<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Feb 2018 09:31:23 +0000.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

	protected $casts = [
		'id' => 'string',
		'wallet_amount' => 'float',
		'investme_point' => 'float',
		'income' => 'float',
		'google_authenticator' => 'int',
		'status_id' => 'int',
		'address_latitude' => 'float',
		'address_longitude' => 'float',
		'rt_ktp' => 'int',
		'rw_ktp' => 'int',
		'is_address_ktp_stay' => 'int',
		'rt_stay' => 'int',
		'rw_stay' => 'int'
	];

	protected $dates = [
		'dob'
	];

	protected $hidden = [
		'password',
		'google2fa_secret',
		'phone_token',
		'email_token',
		'remember_token'
	];

	protected $fillable = [
		'id',
		'email',
		'password',
		'first_name',
		'last_name',
		'username',
		'wallet_amount',
		'investme_point',
		'income',
		'google_authenticator',
		'google2fa_secret',
		'status_id',
		'phone_token',
		'email_token',
		'photo_validation',
		'signature_validation',
		'remember_token',
		'address_latitude',
		'address_longitude',
		'type',
		'age',
		'filed_of_work',
		'religion',
		'identity_number',
		'npwp',
		'place_of_birth',
		'dob',
		'job',
		'phone',
		'secondary_phone',
		'gender',
		'citizen',
		'education',
		'marital_status',
		'mother_name',
		'address_ktp',
		'rt_ktp',
		'rw_ktp',
		'keluarahan_ktp',
		'kecamatan_ktp',
		'city_ktp',
		'province_ktp',
		'postal_code_ktp',
		'is_address_ktp_stay',
		'address_stay',
		'rt_stay',
		'rw_stay',
		'keluarahan_stay',
		'kecamatan_stay',
		'postal_code_stay',
		'fb_acc',
		'ig_acc',
		'twitter_acc',
		'created_by',
		'updated_by'
	];

	public function status()
	{
		return $this->belongsTo(\App\Models\Status::class);
	}

	public function addresses()
	{
		return $this->hasMany(\App\Models\Address::class);
	}

	public function blog_read_users()
	{
		return $this->hasMany(\App\Models\BlogReadUser::class);
	}

	public function carts()
	{
		return $this->hasMany(\App\Models\Cart::class);
	}

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class);
	}

	public function referrals()
	{
		return $this->hasMany(\App\Models\Referral::class, 'user_id_parent');
	}

	public function transaction_wallets()
	{
		return $this->hasMany(\App\Models\TransactionWallet::class);
	}

	public function transactions()
	{
		return $this->hasMany(\App\Models\Transaction::class);
	}

	public function transfer_confirmations()
	{
		return $this->hasMany(\App\Models\TransferConfirmation::class);
	}

	public function vendors()
	{
		return $this->hasMany(\App\Models\Vendor::class);
	}

	public function wallet_statements()
	{
		return $this->hasMany(\App\Models\WalletStatement::class);
	}

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
