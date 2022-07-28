<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payment';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'money', 
                            'memberid',
                            'status', 
                            'code',
                            'method'
                            ]; 
    public  function members() {
        return $this->belongsToMany(Member::class,
                                    Payment::class,
                                    'id',
                                    'memberid');
    }
}
