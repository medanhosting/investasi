<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 28 Aug 2017 06:57:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Address
 * 
 * @property int $id
 * @property string $name
 * @property string $user_id
 * @property int $province_id
 * @property string $province_name
 * @property int $city_id
 * @property string $city_name
 * @property int $subdistrict_id
 * @property string $subdistrict_name
 * @property string $postal_code
 * @property string $detail
 * @property int $status_id
 * 
 * @property \App\Models\Status $status
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $transactions
 *
 * @package App\Models
 */
class Address extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'province_id' => 'int',
		'city_id' => 'int',
		'subdistrict_id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'user_id',
        'name',
		'province_id',
		'province_name',
		'city_id',
		'city_name',
		'subdistrict_id',
		'subdistrict_name',
        'postal_code',
        'detail',
		'status_id'
	];

	public function status()
	{
		return $this->belongsTo(\App\Models\Status::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function transactions()
	{
		return $this->hasMany(\App\Models\Transaction::class);
	}
}
