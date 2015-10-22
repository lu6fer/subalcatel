<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Certificate
 * @package Subalcatel
 */
class Certificate extends Model
{
    /**
     * @var string
     */
    protected $table = 'certificate';

    protected $hidden = [
        'id',
        'user_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Subalcatel\User');
    }

}
