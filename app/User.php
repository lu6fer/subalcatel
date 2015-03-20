<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

/**
 * Class User
 * @package Subalcatel
 */
class User extends Model implements SluggableInterface
{

    use SluggableTrait;
    /**
     * @var string
     */
	protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Sluggable config
     * @var array
     */
    protected $sluggable = array(
        'build_from' => array('firstname', 'name'),
        'save_to' => 'slug'
    );


    /*
	|--------------------------------------------------------------------------
	| User's gestion
	|--------------------------------------------------------------------------
	|
	| Relationship to addresses and to adhesion
	|
	*/
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->hasOne('Subalcatel\Address');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adhesion()
    {
        return $this->hasMany('Subalcatel\Adhesion')->orderBy('date', 'desc');
    }

    public function certificate()
    {
        return $this->hasOne('Subalcatel\Certificate');
    }

    /*
	|--------------------------------------------------------------------------
	| User's blog
	|--------------------------------------------------------------------------
	|
	| Relationship to articles and to comments
	|
	*/
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('Subalcatel\Article');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('Subalcatel\Comment');
    }

    /*
   |--------------------------------------------------------------------------
   | User's dive
   |--------------------------------------------------------------------------
   |
   |
   */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dives()
    {
        return $this->belongsToMany('Subalcatel\Dive')->withPivot('comment', 'drink');
    }

    public function diveOwner()
    {
        return $this->hasMany('Subalcatel\Dive', 'owner');
    }

    /*
	|--------------------------------------------------------------------------
	| User's licence and levels
	|--------------------------------------------------------------------------
	|
	| All user's licences and levels relationship
	|
	*/
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diveLevels()
    {
        return $this->hasMany('Subalcatel\DiveLevel')->orderBy('date', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nitroxLevels()
    {
        return $this->hasMany('Subalcatel\NitroxLevel')->orderBy('date', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function monitorLevels()
    {
        return $this->hasMany('Subalcatel\MonitorLevel')->orderBy('date', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boatLicences()
    {
        return $this->hasMany('Subalcatel\BoatLicence')->orderBy('date', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tivLicence()
    {
        return $this->hasMany('Subalcatel\TivLicence');
    }

}
