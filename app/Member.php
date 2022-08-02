<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'username', 
                            'password', 
                            'point',
                            'charge',
                            'email',
                            'status'
                            ]; 
}
