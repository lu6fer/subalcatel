<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package Subalcatel
 */
class Comment extends Model
{

    /**
     * @var string
     */
	protected $table = 'comments';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Subalcatel\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article()
    {
        return $this->belongsTo('Subalcatel\Article');
    }

}
