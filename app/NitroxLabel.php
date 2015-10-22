<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class NitroxLabel extends Model implements SluggableInterface {

    use SluggableTrait;
    /**
     * @var string
     */
	protected $table = 'nitroxLabels';
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
    public function nitroxLevels()
    {
        return $this->hasMany('Subalcatel\NitroLevel');
    }

}
