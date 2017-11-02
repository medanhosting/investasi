<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 01 Nov 2017 04:53:04 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BlogUrgent
 * 
 * @property int $id
 * @property string $blog_id
 * @property int $status_id
 * @property string $start_date
 * @property string $end_date
 * 
 * @property \App\Models\Blog $blog
 * @property \App\Models\Status $status
 * @property \Illuminate\Database\Eloquent\Collection $blog_read_users
 *
 * @package App\Models
 */
class BlogUrgent extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'blog_id',
		'status_id',
		'start_date',
		'end_date'
	];

	public function blog()
	{
		return $this->belongsTo(\App\Models\Blog::class);
	}

	public function status()
	{
		return $this->belongsTo(\App\Models\Status::class);
	}

	public function blog_read_users()
	{
		return $this->hasMany(\App\Models\BlogReadUser::class);
	}
}
