<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 29-Sep-17
 * Time: 1:28 PM
 */

namespace App\Models;


use Reliese\Database\Eloquent\Model as Eloquent;
/**
 * Class Vendor
 *
 * @property string $id
 * @property string $user_id
 * @property string $description
 * @property float $amount
 * @property \Carbon\Carbon $date
 * @property int $status_id
 * @property \Carbon\Carbon $created_on
 * @property string $created_by
 * @property \Carbon\Carbon $modified_on
 * @property string $modified_by
 *
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class WalletStatement extends Eloquent
{
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'amount' => 'float',
        'status_id' => 'int'
    ];

    protected $dates = [
        'date',
        'created_on',
        'modified_on'
    ];

    protected $fillable = [
        'id',
        'user_id',
        'amount',
        'description',
        'date',
        'status_id',
        'created_on',
        'created_by',
        'modified_on',
        'modified_by'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class);
    }

    public function getAmountAttribute(){
        return number_format($this->attributes['amount'],0, ",", ".");
    }
}