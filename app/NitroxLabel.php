<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

class NitroxLabel extends Model {

    /**
     * @var string
     */
	protected $table = 'nitroxLabels';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function nitroxLevels()
    {
        return $this->hasMany('Subalcatel\NitroLevel');
    }

}
