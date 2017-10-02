<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 28 Aug 2017 06:57:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Status
 * 
 * @property int $id
 * @property string $description
 * 
 * @property \Illuminate\Database\Eloquent\Collection $addresses
 * @property \Illuminate\Database\Eloquent\Collection $products
 * @property \Illuminate\Database\Eloquent\Collection $transactions
 * @property \Illuminate\Database\Eloquent\Collection $user_admins
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Status extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'description'
	];

	public function addresses()
	{
		return $this->hasMany(\App\Models\Address::class);
	}

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class);
	}

	public function transactions()
	{
		return $this->hasMany(\App\Models\Transaction::class);
	}

	public function user_admins()
	{
		return $this->hasMany(\App\Models\UserAdmin::class);
	}

	public function users()
	{
		return $this->hasMany(\App\Models\User::class);
	}
}
