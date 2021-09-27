<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public static function blog()
    {
        return self::where('parent_id',1);
    }

    public static function room()
    {
        return self::where('parent_id',2);
    }

    // Relations
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
