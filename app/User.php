<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','is_active','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($passord)
    {
        $this->attributes['password']=bcrypt($passord);
    }

    public function roles()
    {
        return $this->belongsTo(Role::class,'role_id');
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class,'photo_id');
    }

    public function isAdmin()
    {
        return $this->roles->name=='administrator'?true:false;
    }
}
