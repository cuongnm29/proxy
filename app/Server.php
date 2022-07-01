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
                            'serviceid', 
                            'name', 
                            'time',
                            'status',
                            'isorder'
                            ]; 
    public static function tree() {
        return static::get(); // or based on you question 0?
        }
}
