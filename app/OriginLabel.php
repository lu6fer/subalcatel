<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

/**
 * Class OriginLabel
 * @package Subalcatel
 */
class OriginLabel extends Model implements SluggableInterface
{
    use SluggableTrait;
    /**
     * @var string
     */
    protected $table = 'originLabels';
    protected $hidden = ['id'];

    /**
     * Sluggable config
     * @var array
     */
    protected $sluggable = array(
        'build_from' => array('origin'),
        'save_to' => 'slug'
    );

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adhesion()
    {
        return $this->hasMany('Adhesion', 'origine');
    }

}
