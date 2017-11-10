<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 10 Nov 2017 04:06:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Coupon
 * 
 * @property int $id
 * @property string $name
 * @property float $amount
 * @property int $status_id
 * @property string $created_by
 * @property \Carbon\Carbon $created_at
 * 
 * @property \App\Models\Status $status
 * @property \App\Models\UserAdmin $user_admin
 *
 * @package App\Models
 */
class Coupon extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'amount' => 'float',
		'status_id' => 'int'
	];

	protected $fillable = [
	    'id',
		'name',
		'amount',
		'status_id',
		'created_by'
	];

	public function status()
	{
		return $this->belongsTo(\App\Models\Status::class);
	}

	public function user_admin()
	{
		return $this->belongsTo(\App\Models\UserAdmin::class, 'created_by');
	}
}
