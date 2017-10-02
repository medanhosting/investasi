<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 31 Aug 2017 07:40:01 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProductImage
 * 
 * @property int $id
 * @property string $product_id
 * @property string $path
 * @property int $featured
 * 
 * @property \App\Models\Product $product
 *
 * @package App\Models
 */
class ProductImage extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'featured' => 'int'
	];

	protected $fillable = [
	    'id',
		'product_id',
		'path',
		'featured'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}
}
