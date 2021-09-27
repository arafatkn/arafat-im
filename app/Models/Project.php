<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class Project extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'images' => 'array',
        'client' => 'object'
    ];

    public static $statuslist = ['Hidden', 'Published'];

    public function status()
    {
        return self::$statuslist[$this->status];
    }

    public function getThumbUrl($w=0, $h=0)
    {
        $path = 'projects/thumbs/'.$this->id.'.jpg';

        if(Storage::disk('public')->exists($path))
            return Storage::url($path).'?'.Storage::disk('public')->lastModified($path);
        $path = 'projects/thumbs/'.$this->id.'.webp';
        if(Storage::disk('public')->exists($path))
            return Storage::url($path).'?'.Storage::disk('public')->lastModified($path);
        $path = 'projects/thumbs/'.$this->id.'.png';
        if(Storage::disk('public')->exists($path))
            return Storage::url($path).'?'.Storage::disk('public')->lastModified($path);
        return '/assets/images/works/1.svg';
    }
}
