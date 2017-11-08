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
 * @property string $bank_name
 * @property string $bank_acc_name
 * @property string $bank_acc_number
 * @property int $status_id
 * @property \Carbon\Carbon $created_on
 * @property string $created_by
 * @property \Carbon\Carbon $modified_on
 * @property string $modified_by
 *
 * @property \App\Models\Status $status
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class Vendor extends Eloquent
{
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'status_id' => 'int'
    ];

    protected $dates = [
        'created_on',
        'modified_on'
    ];

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'description',
        'bank_name',
        'bank_acc_name',
        'bank_acc_number',
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

    public function products(){
        return $this->hasMany(Product::class);
    }
}
