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
                	'status'
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
    public function getOrderUserAttribute()
    {

    }
}
