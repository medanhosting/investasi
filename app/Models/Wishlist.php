<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 01 Feb 2018 03:31:12 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Wishlist
 * 
 * @property int $id
 * @property string $product_id
 * @property string $user_id
 * @property \Carbon\Carbon $date
 *
 * @package App\Models
 */
class Wishlist extends Eloquent
{
	public $timestamps = false;

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'product_id',
		'user_id',
		'date'
	];
}
