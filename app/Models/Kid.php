<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Kid extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_kid', 
        'date_d', 
        'card_kid',
        'blood_group',
        'weight',
        'length',
        'head',
        'anomaly',
        'health',
        'mum_id',
    ];
    protected $primaryKey = 'kid_id';
    /**
    *  The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['date_d','deleted_at'];

    public function setDateDAttribute($value)
    {
        if(!empty($value)){
            $this->attributes['date_d'] = Carbon::createFromFormat('d/m/Y', $value);
        }

        else {
            $this->attributes['date_d'] = null;
        }
    }
    /**
    * The number of models to return for pagination.
    *
    * @var int
    */
    protected $perPage = 15;

    /**
    * Get the  job that owns the Document.
    */
    public function injectvaccines()
    {
        return $this->hasMany('App\Models\InjectVaccine');
    } 

    /**
    * Get the  job that owns the Document.
    */
    public function mums()
    {
        return $this->belongsTo('App\Models\Mum');
    }
}