<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'Services';

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
}
  