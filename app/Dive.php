<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

class Dive extends Model
{

    protected $table = 'dives';

    public function users()
    {
        return$this->belongsToMany('Subalcatel\User')->withPivot('comment', 'drink');
    }

    public function owner()
    {
        return $this->belongsTo('Subalcatel\User', 'owner');
    }

}
