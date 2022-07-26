<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
class Server extends Model
{
    protected $table = 'server';

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

        public  function country() {
            return $this->belongsToMany(Country::class,
                                        CountriesHasServer::class,
                                        'server_id',
                                        'countries_id')->select('name','code')->get();
        }
        
}
