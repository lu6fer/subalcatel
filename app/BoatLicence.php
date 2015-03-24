<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

class BoatLicence extends Model
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'boatLicences';

    protected $hidden = [
        'id',
        'user_id',
        'boat_label_id'
    ];

    /**
     * Belongs to relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function boatLabel()
    {
        return $this->belongsTo('Subalcatel\BoatLabel');
    }

    /**
     * Belongs to relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('Subalcatel\User');
    }

}
