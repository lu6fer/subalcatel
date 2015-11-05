<?php

namespace Subalcatel;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
//use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Kodeine\Acl\Traits\HasRole;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract,
                                    SluggableInterface
{
    use Authenticatable,
        //Authorizable,
        CanResetPassword,
        SluggableTrait,
        HasRole;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    protected $sluggable = [
        'build_from' => ['fisrtname', 'name'],
        'save_to'    => 'slug',
    ];

    public function address ()
    {
        return $this->hasOne('Subalcatel\Address');
    }
    public function certificate()
    {
        return $this->hasOne('Subalcatel\Certificate');
    }
    public function adhesion()
    {
        return $this->hasMany('Subalcatel\Adhesion')->orderBy('date', 'desc');
    }
    public function tivLicence()
    {
        return $this->hasOne('Subalcatel\TivLicence')->orderBy('date', 'desc');
    }
    public function diveLevel()
    {
        return $this->hasMany('Subalcatel\DiveLevel')->orderBy('date', 'desc');
    }
    public function monitorLevel()
    {
        return $this->hasMany('Subalcatel\MonitorLevel')->orderBy('date', 'desc');
    }
    public function boatLicence()
    {
        return $this->hasMany('Subalcatel\BoatLicence')->orderBy('date', 'desc');
    }
    public function nitroxLevel()
    {
        return $this->hasMany('Subalcatel\NitroxLevel')->orderBy('date', 'desc');
    }
    public function dives()
    {
        return $this->belongsToMany('Subalcatel\Dive')->withPivot('comment', 'drink');
    }
    public function diveOwner()
    {
        return $this->hasMany('Subalcatel\Dive', 'owner');
    }
    public function articles()
    {
        return $this->hasMany('Subalcatel\Article');
    }
    public function comments()
    {
        return $this->hasMany('Subalcatel\Comment');
    }
}
