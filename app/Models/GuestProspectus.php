<?php
/**
 * Created by PhpStorm.
 * User: yanse
 * Date: 12-Oct-17
 * Time: 9:16 AM
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class DeliveryType
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\Carbon $date
 *
 * @package App\Models
 */
class GuestProspectus extends Eloquent
{
    public $timestamps = false;

    protected $casts = [
        'id' => 'int'
    ];

    protected $dates = [
        'created_on',
        'modified_on'
    ];

    protected $fillable = [
        'name',
        'email',
        'date'
    ];
}