<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class InjectVaccine extends Model
{
     use SoftDeletes;

      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kid_id', 
        'vaccine_id', 
        'date_d',
        'status',
    ];
    protected $primaryKey = 'no';

    protected $dates = ['date_d', 'deleted_at'];

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
    public function kids()
    {
        return $this->belongsTo('App\Models\Kid');
    }

    /**
    * Get the  - that owns the -.
    */
    public function vaccines()
    {
        return $this->belongsTo('App\Models\Vaccine');
    }

    public function statused()
    {
        return $this->belongsTo('App\Models\Statused','status', 'id')->select(['id', 'name']);
    }
}

