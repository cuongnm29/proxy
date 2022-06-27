<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'Member';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'userName', 
                            'password', 
                            'email',
                            'status'
                            ]; 
}
