<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

class MonitorLabel extends Model {

    /**
     * @var string
     */
	protected $table = 'monitorLabels';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function monitorLevels()
    {
        return $this->hasMany('Subalcatel\MonitorLevels');
    }

}
