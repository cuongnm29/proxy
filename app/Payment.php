<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'money', 
                            'memberid',
                            'status', 
                            'code',
                            'method'
                            ]; 
}
