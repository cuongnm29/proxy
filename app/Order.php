<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'serviceId', 
                            'serverId', 
                            'couponId',
                            'qty',
                            'price',
                            'expriredDate'
                            ]; 
}
