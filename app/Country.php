<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Server;
class Country extends Model
{
    protected $table = 'Country';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    protected $fillable = [
                           'name',
                           'isorder',
                           'code',
                           'status'
                            ]; 
    public  function servers() {
        return $this->belongsToMany(Server::class,
                                    CountriesHasServer::class,
                                    'countries_id',
                                    'server_id');
    }
}
