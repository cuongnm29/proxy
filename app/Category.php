<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'Category';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
    
    protected $fillable = [
                            'parrentId', 
                            'name', 
                            'slug',
                            'istype',
                            'isoder',
                            'status'
                            ]; 
}
