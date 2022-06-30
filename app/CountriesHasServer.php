<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountriesHasServer extends Model
{
    protected $table = 'countries_has_server';

    protected $fillable = [
                           'countries_id',
                           'server_id'
                            ]; 
}
