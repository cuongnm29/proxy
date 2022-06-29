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
                           'serverid',
                           'name',
                           'code',
                           'status'
                            ]; 
    public  function server() {
        return $this->belongsTo(Server::class, 'serverid');
    }
}
