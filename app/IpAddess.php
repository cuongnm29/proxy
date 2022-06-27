<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpAddess extends Model
{
    protected $table = 'IpAddress';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'countryId', 
                            'ipName', 
                            'timeExpired',
                            'timeRemain',
                            'status'
                            ]; 
}
