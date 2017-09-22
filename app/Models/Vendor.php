<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 22-Sep-17
 * Time: 3:11 PM
 */

namespace App\Models;



use Reliese\Database\Eloquent\Model as Eloquent;
/**
 * Class Vendor
 *
 * @property string $id
 * @property string $user_id
 * @property string $name
 * @property string $description
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
class Vendor extends Eloquent
{
    public $timestamps = false;

    protected $casts = [
        'status_id' => 'int'
    ];

    protected $dates = [
        'created_on',
        'modified_on'
    ];

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'status_id',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by'
    ];

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class);
    }
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

}
