<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 28 Aug 2017 06:57:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Transaction
 *
 * @property string $id
 * @property string $user_id
 * @property int $payment_method_id
 * @property string $va_bank
 * @property string $va_number
 * @property string $bill_key
 * @property string $biller_code
 * @property string $invoice
 * @property string $order_id
 * @property int $payment_code
 * @property float $total_payment
 * @property float $total_price
 * @property int $total_weight
 * @property string $address_name
 * @property string $phone
 * @property int $province_id
 * @property string $province_name
 * @property int $city_id
 * @property string $city_name
 * @property int $subdistrict_id
 * @property string $subdistrict_name
 * @property string $postal_code
 * @property string $address_detail
 * @property string $tracking_code
 * @property string $courier
 * @property string $courier_code
 * @property string $delivery_type
 * @property string $delivery_type_code
 * @property float $delivery_fee
 * @property float $admin_fee
 * @property \Carbon\Carbon $paid_date
 * @property \Carbon\Carbon $accept_date
 * @property \Carbon\Carbon $2_day_due_date
 * @property \Carbon\Carbon $finish_date
 * @property string $reject_note
 * @property int $status_id
 * @property string $created_by
 * @property \Carbon\Carbon $created_on
 * @property string $modified_by
 * @property \Carbon\Carbon $modified_on
 *
 * @property \App\Models\Address $address
 * @property \App\Models\PaymentMethod $payment_method
 * @property \App\Models\Status $status
 * @property \App\Models\User $user
 * @property \App\Models\Product $product_id
 * @property \Illuminate\Database\Eloquent\Collection $transaction_details
 *
 * @package App\Models
 */
class Transaction extends Eloquent
{
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'payment_method_id' => 'int',
        'payment_code' => 'int',
        'total_payment' => 'float',
        'total_price' => 'float',
        'total_weight' => 'int',
        'province_id' => 'int',
        'city_id' => 'int',
        'subdisctrict_id' => 'int',
        'delivery_fee' => 'float',
        'admin_fee' => 'float',
        'status_id' => 'int'
    ];

    protected $dates = [
        'paid_date',
        'accept_date',
        '2_day_due_date',
        'finish_date',
        'created_on',
        'modified_on'
    ];

    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'payment_method_id',
        'va_bank',
        'va_number',
        'bill_key',
        'biller_code',
        'invoice',
        'order_id',
        'payment_code',
        'total_payment',
        'total_price',
        'total_weight',
        'address_name',
        'phone',
        'province_id',
        'province_name',
        'city_id',
        'city_name',
        'subdistrict_id',
        'subdistrict_name',
        'postal_code',
        'address_detail',
        'tracking_code',
        'courier',
        'courier_code',
        'delivery_type',
        'delivery_type_code',
        'delivery_fee',
        'admin_fee',
        'paid_date',
        'accept_date',
        'delivery_fee',
        'finish_date',
        'reject_note',
        '2_day_due_date',
        'status_id',
        'created_by',
        'created_on',
        'modified_by',
        'modified_on'
    ];

    public function address()
    {
        return $this->belongsTo(\App\Models\Address::class);
    }

    public function payment_method()
    {
        return $this->belongsTo(\App\Models\PaymentMethod::class);
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class);
    }

    public function transaction_details()
    {
        return $this->hasMany(\App\Models\TransactionDetail::class);
    }

    public function transfer_confirmation()
    {
        return $this->hasMany(\App\Models\TransferConfirmation::class);
    }

    public function getTotalPriceAttribute(){
        return number_format($this->attributes['total_price'],0, ",", ".");
    }

    public function getTotalPaymentAttribute(){
        return number_format($this->attributes['total_payment'],0, ",", ".");
    }

    public function getDeliveryFeeAttribute(){
        return number_format($this->attributes['delivery_fee'],0, ",", ".");
    }

    public function getAdminFeeAttribute(){
        return number_format($this->attributes['admin_fee'],0, ",", ".");
    }
}

