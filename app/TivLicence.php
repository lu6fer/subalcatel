<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

class TivLicence extends Model
{
    /**
     * @var string
     */
    protected $table = 'tivLicences';

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
