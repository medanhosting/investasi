<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 12 Sep 2017 06:24:04 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Banner
 * 
 * @property int $id
 * @property string $product_id
 * @property int $type
 * @property string $image_path
 * @property string $url
 * @property string $caption
 * @property string $sub_caption
 * @property int $status_id
 * @property \Carbon\Carbon $created_at
 * @property string $created_by
 * @property \Carbon\Carbon $updated_at
 * @property string $updated_by
 * 
 * @property \App\Models\UserAdmin $user_admin
 * @property \App\Models\Product $product
 * @property \App\Models\Status $status
 *
 * @package App\Models
 */
class Banner extends Eloquent
{
    public $timestamps = false;

	protected $casts = [
		'type' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'product_id',
		'type',
		'image_path',
		'url',
		'caption',
		'sub_caption',
		'status_id',
		'created_by',
		'updated_by'
	];

    public function user_admin_created_by()
    {
        return $this->belongsTo(\App\Models\UserAdmin::class, 'created_by');
    }

	public function user_admin_updated_by()
	{
		return $this->belongsTo(\App\Models\UserAdmin::class, 'updated_by');
	}

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}

	public function status()
	{
		return $this->belongsTo(\App\Models\Status::class);
	}
}
