<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Feb 2018 09:31:35 +0000.
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
 * @property string $profile_picture
 * @property string $bank_name
 * @property string $bank_acc_name
 * @property string $bank_acc_number
 * @property string $legal_entity_id
 * @property int $legal_entity_type
 * @property string $legal_entity_name
 * @property \Carbon\Carbon $loan_application_date
 * @property float $total_loan_application
 * @property string $rating
 * @property string $credit_infromation
 * @property float $total_loan_application_approved
 * @property \Carbon\Carbon $loan_offer_date
 * @property float $total_loan_offer
 * @property string $guarantee
 * @property float $total_loan_offer_approved
 * @property string $use_loan
 * @property int $payment_frequency
 * @property int $payment_type
 * @property int $interest_rate
 * @property \Carbon\Carbon $due_date
 * @property int $tenor_loan
 * @property float $remaining_loan
 * @property string $loan_status
 * @property string $vendor_type
 * @property string $business_type
 * @property string $brand
 * @property int $establish_since
 * @property int $ownership
 * @property string $address
 * @property string $postal_code
 * @property string $city
 * @property string $province
 * @property string $phone_office
 * @property float $monthly_income
 * @property float $monthly_profit
 * @property string $fb_acc
 * @property string $ig_acc
 * @property string $twitter_acc
 * @property string $youtube_acc
 * @property int $status_id
 * @property \Carbon\Carbon $created_at
 * @property string $created_by
 * @property \Carbon\Carbon $updated_at
 * @property string $updated_by
 * 
 * @property \App\Models\Status $status
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class Vendor extends Eloquent
{
	public $incrementing = false;
    public $timestamps = false;

	protected $casts = [
		'id' => 'string',
		'legal_entity_type' => 'int',
		'total_loan_application' => 'float',
		'total_loan_application_approved' => 'float',
		'total_loan_offer' => 'float',
		'total_loan_offer_approved' => 'float',
		'payment_frequency' => 'int',
		'payment_type' => 'int',
		'interest_rate' => 'int',
		'tenor_loan' => 'int',
		'remaining_loan' => 'float',
		'establish_since' => 'int',
		'ownership' => 'int',
		'monthly_income' => 'float',
		'monthly_profit' => 'float',
		'status_id' => 'int'
	];

	protected $dates = [
		'loan_application_date',
		'loan_offer_date',
		'due_date',
		'created_at',
		'updated_at'
	];

	protected $fillable = [
		'id',
		'user_id',
		'name',
		'description',
		'profile_picture',
		'bank_name',
		'bank_acc_name',
		'bank_acc_number',
		'legal_entity_id',
		'legal_entity_type',
		'legal_entity_name',
		'loan_application_date',
		'total_loan_application',
		'rating',
		'credit_infromation',
		'total_loan_application_approved',
		'loan_offer_date',
		'total_loan_offer',
		'guarantee',
		'total_loan_offer_approved',
		'use_loan',
		'payment_frequency',
		'payment_type',
		'interest_rate',
		'due_date',
		'tenor_loan',
		'remaining_loan',
		'loan_status',
		'vendor_type',
		'business_type',
		'brand',
		'establish_since',
		'ownership',
		'address',
		'postal_code',
		'city',
		'province',
		'phone_office',
		'monthly_income',
		'monthly_profit',
		'fb_acc',
		'ig_acc',
		'twitter_acc',
		'youtube_acc',
		'status_id',
		'created_at',
		'created_by',
		'updated_at',
		'updated_by'
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
