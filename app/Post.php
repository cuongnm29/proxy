<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'catid',
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
