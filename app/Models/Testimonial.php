<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $guarded = ['id'];

    public static $statuslist = ['Private', 'Public'];

    public function status()
    {
        return self::$statuslist[$this->status];
    }
}
