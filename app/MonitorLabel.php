<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class MonitorLabel extends Model implements SluggableInterface {

    use SluggableTrait;
    /**
     * @var string
     */
	protected $table = 'monitorLabels';
    protected $hidden = ['id'];

    /**
     * Sluggable config
     * @var array
     */
    protected $sluggable = array(
        'build_from' => array('level'),
        'save_to' => 'slug'
    );

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function monitorLevels()
    {
        return $this->hasMany('Subalcatel\MonitorLevels');
    }

}
