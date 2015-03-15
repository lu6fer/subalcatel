<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InsuranceLabel
 * @package Subalcatel
 */
class InsuranceLabel extends Model
{
    /**
     * @var string
     */
    protected $table = 'insuranceLabels';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adhesion()
    {
        return $this->hasMany('Adhesion', 'insurance');
    }
}
