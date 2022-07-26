<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'name', 
                            'description', 
                            'content',
                            'icon',
                            'isorder',
                            'status'
                            ]; 
   public static function tree() {
       return static::get(); // or based on you question 0?
     }
     public function server()
    {
        return $this->hasMany(Server::class, 'serviceid', 'id');
    }
    public function countries()
    {
        return $this->hasMany(CountriesHasServer::class, 'countries_id', 'server_id');
    }
}
  