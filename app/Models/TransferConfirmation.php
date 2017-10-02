<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 07 Sep 2017 12:25:21 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TransferConfirmation
 * 
 * @property int $id
 * @property string $user_id
 * @property string $transaction_id
 * @property string $receiver_bank
 * @property float $transfer_amount
 * @property string $sender_name
 * @property \Carbon\Carbon $transfer_date
 * @property string $note
 * @property int $status_id
 * @property \Carbon\Carbon $created_on
 * @property string $created_by
 * @property \Carbon\Carbon $modified_on
 * @property string $modified_by
 * 
 * @property \App\Models\Status $status
 * @property \App\Models\Transaction $transaction
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class TransferConfirmation extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'transfer_amount' => 'float',
		'status_id' => 'int'
	];

	protected $dates = [
		'transfer_date',
		'created_on',
		'modified_on'
	];

	protected $fillable = [
		'user_id',
		'trx_id',
		'receiver_bank',
		'transfer_amount',
		'sender_name',
		'transfer_date',
		'note',
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

	public function transaction()
	{
		return $this->belongsTo(\App\Models\Transaction::class, 'transaction_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

	public function getTransferAmountAttribute(){
        return number_format($this->attributes['transfer_amount'],0, ",", ".");
    }
}
