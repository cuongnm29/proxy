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
                            'parent_id', 
                            'name', 
                            'slug',
                            'istype',
                            'ismenu',
                            'isorder',
                            'status'
                            ]; 
    public function parent()
    {
        return $this->belongsTo(Category::class, 'id', 'parent_id'); // I believe you can use also hasOne().
    }
    
    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public static function tree() {
        return static::where('parent_id', '=', 0)->get(); // or based on you question 0?
    }
    public static function treeNews() {
        return static::where('parent_id', '=', 0)->where('istype','!=',4)->get(); // or based on you question 0?
    }
                            
}
