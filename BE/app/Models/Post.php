<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Media;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
    protected $with = ['user','image', 'medias'];
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function medias(): MorphMany
    {
        return $this->morphMany(Media::class, 'videoable');
    }
}
