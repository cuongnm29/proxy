<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    protected $table = 'IpAddress';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'ipName', 
                            'timeExpired',
                            'status'
                            ]; 
        public  function servers() {
            return $this->belongsToMany(Server::class,
                                        ServerHasIpAddress::class,
                                        'ipaddressid',
                                        'serverid');
        }
        public  function countries() {
            return $this->belongsToMany(Country::class,
                                        CountriesHasIpAddress::class,
                                        'ipaddressid',
                                        'countriesid');
        }
}
