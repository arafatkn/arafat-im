<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];

    public static $statuslist = ['Hidden', 'Shown'];

    public function status()
    {
        return self::$statuslist[$this->status];
    }

    // Override
    public function delete()
    {
        $this->rooms()->detach();
        return parent::delete();
    }

	// Relations
    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

}
