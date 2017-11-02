<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 01 Nov 2017 04:52:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BlogReadUser
 * 
 * @property int $id
 * @property string $user_id
 * @property int $blog_urgent_id
 * @property int $status_id
 * 
 * @property \App\Models\BlogUrgent $blog_urgent
 * @property \App\Models\Status $status
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class BlogReadUser extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'blog_urgent_id' => 'int',
		'status_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'blog_urgent_id',
		'status_id'
	];

	public function blog_urgent()
	{
		return $this->belongsTo(\App\Models\BlogUrgent::class);
	}

	public function status()
	{
		return $this->belongsTo(\App\Models\Status::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
