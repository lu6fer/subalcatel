<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

/**
 * Class InsuranceLabel
 * @package Subalcatel
 */
class InsuranceLabel extends Model implements SluggableInterface
{
    use SluggableTrait;
    /**
     * @var string
     */
    protected $table = 'insuranceLabels';
    protected $hidden = ['id'];

    /**
     * Sluggable config
     * @var array
     */
    protected $sluggable = array(
        'build_from' => array('insurance'),
        'save_to' => 'slug'
    );

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adhesion()
    {
        return $this->hasMany('Subalcatel\Adhesion', 'insurance');
    }
}
