<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

/**
 * Class Article
 * @package Subalcatel
 */
class Article extends Model implements SluggableInterface
{

    use SluggableTrait;
    /**
     * @var string
     */
	protected $table = 'articles';

    /**
     * Sluggable config
     * @var array
     */
    protected $sluggable = array(
        'build_from' => array('title'),
        'save_to' => 'slug'
    );

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Subalcatel\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('Subalcatel\Comment');
    }

}
