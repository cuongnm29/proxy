<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public $table = 'setting';

    protected $dates = [
        'created_at',
        'updated_at',
        
    ];

    protected $fillable = [
        'logo',
        'contact',
        'bankname',
        'banknumber',
        'bankowner',
        'banksynax',
        'titlepage',
        'meta',
        'keyword',
        'created_at',
        'updated_at'
        
    ];
}