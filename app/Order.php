<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
   protected $fillable = [
   	'table_id', 'restaurant_id', 'total_price', 'order_status'
   ];
}
