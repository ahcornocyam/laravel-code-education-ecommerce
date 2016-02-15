<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table    = "orders";
    protected $fillable = [
                	'user_id',
                	'total',
                	'status_id',
                  'transaction_code',
                  'payment_type_id',
                  'netAmount'
              ];
    protected $dates = ['created_at', 'updated_at'];

    public function items()
    {
    	  return $this->hasMany('CodeCommerce\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('CodeCommerce\User');
    }

    public function orderPaymenttype()
    {
        return $this->belongsTo('CodeCommerce\OrderPaymenttype');
    }

    public function status()
    {
        return $this->belongsTo('CodeCommerce\OrderStatus');
    }
}
