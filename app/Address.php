<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * @package Subalcatel
 */
class Address extends Model
{
    /**
     * @var string
     */
    protected $table = 'address';

    protected $hidden =[
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
