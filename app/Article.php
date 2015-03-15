<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package Subalcatel
 */
class Article extends Model
{

    /**
     * @var string
     */
	protected $table = 'articles';

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
