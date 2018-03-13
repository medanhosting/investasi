<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 13 Nov 2017 07:55:02 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Blog
 * 
 * @property string $id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property int $category_id
 * @property string $product_id
 * @property int $read_count
 * @property int $status_id
 * @property \Carbon\Carbon $created_at
 * @property string $created_by
 * @property \Carbon\Carbon $updated_at
 * @property string $updated_by
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\UserAdmin $user_admin
 * @property \App\Models\Product $product
 * @property \App\Models\Status $status
 * @property \Illuminate\Database\Eloquent\Collection $blog_urgents
 *
 * @package App\Models
 */
class Blog extends Eloquent
{
	public $incrementing = false;

	protected $casts = [
		'category_id' => 'int',
		'read_count' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
	    'id',
		'title',
		'alias',
		'description',
		'category_id',
		'product_id',
		'read_count',
		'status_id',
		'created_by',
		'updated_by'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class);
	}

	public function user_admin()
	{
		return $this->belongsTo(\App\Models\UserAdmin::class, 'created_by');
	}

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}

	public function status()
	{
		return $this->belongsTo(\App\Models\Status::class);
	}

	public function blog_urgents()
	{
		return $this->hasMany(\App\Models\BlogUrgent::class);
	}
}
