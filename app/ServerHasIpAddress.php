<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Server;
use App\Country;
class ServerHasIpAddress extends Model
{
    protected $table = 'server_has_ipaddress';

    protected $fillable = [
                           'serverid',
                           'ipaddressid',
                           'countriesid'
                            ]; 
    public  function servers() {
        return $this->belongsToMany(Server::class,
                                    ServerHasIpAddress::class,
                                    'countriesid',
                                    'serverid');
    }
    public  function countries() {
        return $this->belongsToMany(Country::class,
                                    ServerHasIpAddress::class,
                                    'countriesid',
                                    'serverid');
    }
}
