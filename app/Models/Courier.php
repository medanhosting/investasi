<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 28 Aug 2017 06:57:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Courier
 * 
 * @property int $id
 * @property string $description
 * @property int $status_id
 * 
 * @property \Illuminate\Database\Eloquent\Collection $delivery_types
 * @property \Illuminate\Database\Eloquent\Collection $transactions
 *
 * @package App\Models
 */
class Courier extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'description',
        'status_id'
	];

	public function delivery_types()
	{
		return $this->hasMany(\App\Models\DeliveryType::class);
	}

	public function transactions()
	{
		return $this->hasMany(\App\Models\Transaction::class);
	}

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class);
    }
}
