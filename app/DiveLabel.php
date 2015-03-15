<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

class DiveLabel extends Model {

    /*
     * Table name
     */
	protected $table = 'diveLabels';

    /**
     * Declare HasMany relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function diveLevel()
    {
        return $this->hasMany('Subalcatel\DiveLevel');
    }

}
