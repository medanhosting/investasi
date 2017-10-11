<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 28 Aug 2017 06:57:19 +0000.
 */

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
/**
 * Class UserAdmin
 * 
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property int $status_id
 * @property \Carbon\Carbon $created_on
 * @property string $created_by
 * @property \Carbon\Carbon $modified_on
 * @property string $modified_by
 * 
 * @property \App\Models\Status $status
 *
 * @package App\Models
 */
class UserAdmin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user_admins';

    protected $table = 'user_admins';

    protected $casts = [
        'id' => 'string'
    ];

    protected $fillable = [
        'id',
        'email',
        'password',
        'first_name',
        'last_name',
        'phone',
        'status_id',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
}
