<?php namespace Subalcatel;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Adhesion
 * @package Subalcatel
 */
class Adhesion extends Model
{
    /**
     * @var string
     */
    protected $table = 'adhesions';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Subalcatel\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function origin()
    {
        return $this->belongsTo('Subalcatel\OriginLabel', 'origin_label_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function insurance()
    {
        return $this->belongsTo('Subalcatel\InsuranceLabel', 'insurance_label_id');
    }
}
