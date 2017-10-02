<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 06 Sep 2017 08:49:35 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Province
 * 
 * @property int $id
 * @property string $name
 *
 * @package App\Models
 */
class Province extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $fillable = [
		'name'
	];
}
