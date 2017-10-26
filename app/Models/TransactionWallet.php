<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 26 Oct 2017 04:46:06 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TransactionWallet
 * 
 * @property int $id
 * @property string $user_id
 * @property int $payment_method_id
 * @property string $order_id
 * @property string $va_bank
 * @property string $va_number
 * @property string $bill_key
 * @property string $biller_code
 * @property float $amount
 * @property float $admin_fee
 * @property float $total_payment
 * @property int $status_id
 * @property string $created_by
 * @property \Carbon\Carbon $created_at
 * @property string $updated_by
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 * @property \App\Models\PaymentMethod $payment_method
 * @property \App\Models\Status $status
 *
 * @package App\Models
 */
class TransactionWallet extends Eloquent
{
	protected $casts = [
		'payment_method_id' => 'int',
		'amount' => 'float',
		'admin_fee' => 'float',
		'total_payment' => 'float',
		'status_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'payment_method_id',
		'order_id',
		'va_bank',
		'va_number',
		'bill_key',
		'biller_code',
		'amount',
		'admin_fee',
		'total_payment',
		'status_id',
		'created_by',
		'updated_by'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function payment_method()
	{
		return $this->belongsTo(\App\Models\PaymentMethod::class);
	}

	public function status()
	{
		return $this->belongsTo(\App\Models\Status::class);
	}
}
