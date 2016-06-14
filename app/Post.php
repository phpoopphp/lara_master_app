<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=['title','body','photo_id','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class,'photo_id');
    }
}
