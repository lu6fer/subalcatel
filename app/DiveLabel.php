<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class DiveLabel extends Model implements SluggableInterface {

    use SluggableTrait;

    /*
     * Table name
     */
	protected $table = 'diveLabels';

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
     * Declare HasMany relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diveLevel()
    {
        return $this->hasMany('Subalcatel\DiveLevel');
    }

}
