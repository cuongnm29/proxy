<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'Country';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    protected $fillable = [
                           'serverId',
                           'name',
                           'code',
                           'status'
                            ]; 
}
