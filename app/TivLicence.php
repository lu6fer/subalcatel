<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

class TivLicence extends Model
{
    /**
     * @var string
     */
    protected $table = 'tivLicences';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('User');
    }
}
