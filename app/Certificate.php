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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Subalcatel\User');
    }

}
