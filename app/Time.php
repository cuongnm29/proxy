<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'time';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    protected $fillable = [
                           'name',
                           'isorder',
                           'status'
                            ]; 
    public  function servers() {
        return $this->belongsToMany(Server::class,
                                    TimeHasServer::class,
                                    'time_id',
                                    'server_id');
    }
}
