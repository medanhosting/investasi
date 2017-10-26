<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 26 Oct 2017 03:52:47 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Referral
 * 
 * @property int $id
 * @property string $user_id_parent
 * @property string $user_id_child
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Referral extends Eloquent
{
	public $timestamps = false;

	protected $fillable = [
		'user_id_parent',
		'user_id_child'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'user_id_parent');
	}

    public function user1()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id_child');
    }
}
