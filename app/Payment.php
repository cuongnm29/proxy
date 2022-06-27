<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'Payment';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'money', 
                            'status', 
                            'code',
                            'method'
                            ]; 
}
