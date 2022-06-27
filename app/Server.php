<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $table = 'Server';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'serviceId', 
                            'name', 
                            'time',
                            'status',
                            'isorder'
                            ]; 
}
