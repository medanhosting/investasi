<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 28 Aug 2017 06:57:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Cart
 * 
 * @property int $id
 * @property string $product_id
 * @property string $user_id
 * @property int $quantity
 * @property float $invest_amount
 * @property float $total_invest_amount
 * @property int $courier_id
 * @property int $delivery_type_id
 * @property float $delivery_fee
 * @property float $admin_fee
 * @property string $order_id
 * @property string $payment_method
 *
 * @property \App\Models\Product $product
 * @property \App\Models\User $user
 * @property \App\Models\Courier $courier
 * @property \App\Models\DeliveryType $delivery_type
 *
 * @package App\Models
 */
class Cart extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'quantity' => 'int',
        'invest_amount' => 'float',
		'total_invest_amount' => 'float',
        'delivery_fee' => 'float',
        'admin_fee' => 'float'
	];

	protected $fillable = [
		'product_id',
		'user_id',
		'quantity',
        'invest_amount',
		'total_invest_amount',
        'courier_id',
        'delivery_type_id',
        'delivery_fee',
        'admin_fee',
        'order_id',
        'payment_method'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

    public function getInvestAmountAttribute(){
        return number_format($this->attributes['invest_amount'], 0, ",", ".");
    }

    public function getTotalInvestAmountAttribute(){
        return number_format($this->attributes['total_invest_amount'], 0, ",", ".");
    }

    public function courier()
    {
        return $this->belongsTo(\App\Models\Courier::class);
    }
    public function deliveryType()
    {
        return $this->belongsTo(\App\Models\DeliveryType::class);
    }

    public function getDeliveryFeeAttribute(){
        return number_format($this->attributes['delivery_fee'], 0, ",", ".");
    }

    public function getAdminFeeAttribute(){
        return number_format($this->attributes['admin_fee'], 0, ",", ".");
    }
}
