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
                            ]; 
    
}
