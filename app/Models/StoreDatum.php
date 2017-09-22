<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 15 Sep 2017 02:42:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StoreDatum
 *
 * @property int $id
 * @property string $address
 * @property int $province_id
 * @property int $city_id
 * @property int $subdistrict_id
 * @property string $subdistrict_name
 * @property string $postal_code
 *
 * @package App\Models
 */
class StoreDatum extends Eloquent
{
    public $timestamps = false;

    protected $casts = [
        'province_id' => 'int',
        'city_id' => 'int',
        'subdistrict_id' => 'int'
    ];

    protected $fillable = [
        'address',
        'province_id',
        'city_id',
        'subdistrict_id',
        'subdistrict_name',
        'postal_code'
    ];
}
