<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'Coupon';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'name', 
                            'percent', 
                            'status',
                            ]; 
}
