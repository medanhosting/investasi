<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Sep 2017 08:49:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class City
 * 
 * @property int $id
 * @property string $name
 * @property int $province_id
 *
 * @package App\Models
 */
class City extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'province_id' => 'int'
	];

	protected $fillable = [
		'name',
		'province_id'
	];
}
