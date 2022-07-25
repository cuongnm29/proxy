<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'blog';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
                            'title', 
                            'slug', 
                            'content',
                            'summary',
                            'isorder',
                            'ishome',
                            'photo',
                            'status'
                            ]; 
}
