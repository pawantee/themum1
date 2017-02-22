<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaccine extends Model
{
use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    protected $primaryKey = 'vaccine_id';
    /**
    *  The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    /**
    * The number of models to return for pagination.
    *
    * @var int
    */
    protected $perPage = 15;

    /**
    * Get the  - that owns the -.
    */
    public function injectvaccines()
    {
        return $this->hasMany('App\Models\InjectVaccine');
    }
}