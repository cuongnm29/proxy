<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeHasServer extends Model
{
    protected $table = 'time_has_server';

    protected $fillable = [
                           'time_id',
                           'server_id'
                            ]; 
}
