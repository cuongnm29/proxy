<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Orders extends Model
{
    protected $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'countriesid', 
                            'serverid', 
                            'couponid',
                            'memberid',
                            'timeid',
                            'qty',
                            'price',
                            'exprireddate'
                            ]; 
                            public  function members() {
                                return $this->belongsToMany(Member::class,
                                                            Orders::class,
                                                            'id',
                                                            'memberid');
                            }
                            public  function servers() {
                                return $this->belongsToMany(Server::class,
                                                            Orders::class,
                                                            'id',
                                                            'serverid');
                            }
    
}
