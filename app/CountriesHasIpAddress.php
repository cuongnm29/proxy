<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountriesHasIpAddress extends Model
{
    protected $table = 'countries_has_ipaddress';

    protected $fillable = [
                           'countriesid',
                           'ipaddressid',
                            ]; 
}
