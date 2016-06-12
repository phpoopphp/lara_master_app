<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=['file'];

    public function user()
    {
        return $this->hasMany(User::class,'photo_id');
    }
}
