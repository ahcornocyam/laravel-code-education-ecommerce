<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
        protected $table = 'order_statuses';
        protected $fillable = [
          'id',
          'name'
        ];

        public function order()
        {
            return $this->hasOne('CodeCommerce\Order');
        }
}
