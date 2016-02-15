<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderPaymenttype extends Model
{
    //
    protected $table = 'order_paymenttypes';
    protected $fillable = ['id','name'];

    public function order()
    {
        return $this->hasOne('CodeCommerce\Order');
    }
}
