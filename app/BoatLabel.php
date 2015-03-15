<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

class BoatLabel extends Model
{

    /**
     * @var string
     */
    protected $table = 'boatLabels';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function boatLicences()
    {
        return $this->hasMany('BoatLicence');
    }

}
