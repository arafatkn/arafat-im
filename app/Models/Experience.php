<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $guarded = ['id'];
    
    protected $casts = [
        'joined_at' => 'date',
        'quit_at' => 'date'
    ];
	
	public static $statuslist = ['Private', 'Public'];

    public function status()
    {
        return self::$statuslist[$this->status];
    }

}
