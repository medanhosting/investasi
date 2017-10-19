<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 19-Oct-17
 * Time: 2:38 PM
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Banner
 *
 * @property string $id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property int $read_count
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
class Blog extends Eloquent
{
    public $timestamps = false;

    protected $casts = [
        'type' => 'int',
        'status_id' => 'int'
    ];

    protected $fillable = [
        'id',
        'title',
        'alias',
        'description',
        'read_count',
        'status_id',
        'created_by',
        'created_at',
        'modified_by',
        'modified_at'
    ];

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class);
    }
}