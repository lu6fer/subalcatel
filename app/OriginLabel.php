<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OriginLabel
 * @package Subalcatel
 */
class OriginLabel extends Model
{
    /**
     * @var string
     */
    protected $table = 'originLabels';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adhesion()
    {
        return $this->hasMany('Adhesion', 'origine');
    }

}
