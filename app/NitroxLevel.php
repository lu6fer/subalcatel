<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

class NitroxLevel extends Model
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'nitroxLevels';

    /**
     * Belongs to relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nitroxLabel()
    {
        return $this->belongsTo('Subalcatel\NitroxLabel');
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
