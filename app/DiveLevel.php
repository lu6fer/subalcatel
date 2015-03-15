<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

class DiveLevel extends Model
{

    /**
     * Table name
     * @var string
     */
    protected $table = 'diveLevels';

    /**
     * Belongs to relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function diveLabel()
    {
        return $this->belongsTo('Subalcatel\DiveLabel');
    }

    /**
     * Belongs to relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('Subalcatel\User');
    }

}
