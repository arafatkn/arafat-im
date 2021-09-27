<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [ 'id', 'email', 'password' ];

    protected $hidden = [ 'password', 'remember_token', ];

    protected $casts = [ 'email_verified_at' => 'datetime' ];

    public static $genderlist = [ 'Male', 'Female', 'Other' ];

    public static $typelist = ['Student','Doctor'];

    //
    public function gender()
    {
        return self::$genderlist[$this->gender];
    }

    public function type()
    {
        return self::$typelist[$this->type];
    }

    //
    public function getThumbUrl($w=0, $h=0)
    {
        if($w && $h)
        {
            if(Storage::disk('public')->exists('thumbs/users/'.$this->id.'_'.$w.'x'.$h.'.jpg'))
                return '/storage/thumbs/users/'.$this->id.'_'.$w.'x'.$h.'.jpg';
        }

        return '/storage/thumbs/users/'.$this->id.'.jpg';
    }

    public function uploadImage(UploadedFile $file)
    {
        $file->storeAs('thumbs/users', $this->id.'.jpg', 'public');
        $img = Image::make( storage_path('app/public/thumbs/users/'.$this->id.'.jpg') );
        $w = $img->width();
        $h = $img->height();
        $img = $img->crop($w>$h?$h:$w, $w>$h?$h:$w);
        $img->save( storage_path('app/public/thumbs/users/'.$this->id.'.jpg'), 80, 'jpg');
        $this->generateThumb(600,600);
        $this->generateThumb(400,400);
        $this->generateThumb(200,200);
        return true;
    }

    public function generateThumb($w, $h)
    {
        $img = Image::make( storage_path('app/public/thumbs/users/'.$this->id.'.jpg') );
        $img = $img->resize($w, $h, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save( storage_path('app/public/thumbs/users/'.$this->id.'_'.$w.'x'.$h.'.jpg'), 80, 'jpg');
    }

    // Relations
    public function college()
    {
        return $this->belongsTo(College::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withPivot('invoice_id','status','expires');
    }

    public function seminars()
    {
        return $this->belongsToMany(Seminar::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
