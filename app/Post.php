<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'Post';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'title', 
                            'slug', 
                            'content',
                            'images',
                            'status'
                            ]; 
}
