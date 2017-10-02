<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 28 Aug 2017 06:57:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TransactionDetail
 * 
 * @property string $id
 * @property string $transaction_id
 * @property string $product_id
 * @property string $name
 * @property int $weight
 * @property float $price_basic
 * @property int $discount
 * @property float $discount_flat
 * @property float $price_final
 * @property int $quantity
 * @property float $subtotal_price
 * @property string $created_by
 * @property \Carbon\Carbon $created_on
 * @property string $modified_by
 * @property \Carbon\Carbon $modified_on
 * 
 * @property \App\Models\Product $product
 * @property \App\Models\Transaction $transaction
 *
 * @package App\Models
 */
class TransactionDetail extends Eloquent
{
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'price_basic' => 'float',
		'price_final' => 'float',
		'subtotal_price' => 'float',
		'quantity' => 'int',
		'discount' => 'int',
		'discount_flat' => 'float',
		'weight' => 'int'
	];

	protected $dates = [
		'created_on',
		'modified_on'
	];

	protected $fillable = [
	    'id',
		'transaction_id',
		'product_id',
		'name',
        'weight',
		'price_basic',
		'discount',
		'discount_flat',
        'price_final',
        'quantity',
        'subtotal_price',
		'created_by',
		'created_on',
		'modified_by',
		'modified_on'
	];

	public function product()
	{
		return $this->belongsTo(\App\Models\Product::class);
	}

	public function transaction()
	{
		return $this->belongsTo(\App\Models\Transaction::class);
	}

	public function getPriceFinalAttribute(){
        return number_format($this->attributes['price_final'],0, ",", ".");
    }

    public function getSubtotalPriceAttribute(){
        return number_format($this->attributes['subtotal_price'],0, ",", ".");
    }
}
