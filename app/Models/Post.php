<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class Post extends Model
{
    protected $guarded = ['id'];

    public static $statuslist = ['Hidden', 'Published'];

    public function status()
    {
        return self::$statuslist[$this->status];
    }

    public function getThumbUrl($w=0, $h=0)
    {
        $path = 'posts/'.$this->id.'.jpg';

        if(Storage::disk('public')->exists($path))
            return Storage::url($path).'?'.Storage::disk('public')->lastModified($path);
        else
            return '/images/default-post.jpg';
    }

    // New Helpers
    public function url()
    {
        return url('/posts/'.$this->id.'/'.$this->slug);
    }

    public function uploadImage(UploadedFile $file)
    {
        $file->storeAs('posts', $this->id.'.jpg', 'public');
        $img = Image::make( storage_path('app/public/posts/'.$this->id.'.jpg') );
        $img = $img->resize(640, 380, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save( storage_path('app/public/posts/'.$this->id.'.jpg'), 80, 'jpg');
        return true;
    }

    public function generateThumb($w, $h)
    {
        $img = Image::make( storage_path('app/public/posts/'.$this->id.'.jpg') );
        $img = $img->resize($w, $h, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save( storage_path('app/public/posts/'.$this->id.'_'.$w.'x'.$h.'.jpg'), 80, 'jpg');
    }

    // Override
    public function delete()
    {
        $this->comments()->delete();
        Storage::disk('public')->delete('posts/'.$this->id.'.jpg');
        return parent::delete();
    }

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
