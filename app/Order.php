<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_code',
        'type',
        'product_items',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'payment_type',
        'note',
        'coupon',
        'tax',
        'subtotal',
        'totals',
        'shipping',
        'required_note',
        'status',
        'bank_transfer_name',
        'bank_transfer_account_type',
        'bank_transfer_account_name',
        'bank_transfer_swift_code',
    ];

    protected $casts = [
      'product_items' => 'array'
    ];

    public function getDaily()
    {
        return self::whereDate('created_date', date('Y-m-d'))->orderBy('id', 'desc')->get();
    }

    public function getAll()
    {
        return self::orderBy('id', 'desc')->get();
    }
}
