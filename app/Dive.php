<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Dive extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $table = 'dives';

    protected $hidden = ['id'];

    /**
     * Sluggable config
     * @var array
     */
    protected $sluggable = array(
        'build_from' => array('title', 'date'),
        'save_to' => 'slug'
    );

    /**
     * @return $this
     */
    public function users()
    {
        return $this->belongsToMany('Subalcatel\User')->withPivot('comment', 'drink');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner()
    {
        return $this->belongsTo('Subalcatel\User', 'owner');
    }

}
