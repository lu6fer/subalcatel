<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

class MonitorLevel extends Model
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'monitorLevels';

    /**
     * Belongs to relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function monitorLabel()
    {
        return $this->belongsTo('Subalcatel\MonitorLabel');
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
