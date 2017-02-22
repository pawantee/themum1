<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mum extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_mum', 
        'crad', 
        'profession_mum',
        'religion_mum',
        'study_mum',
        'tel_mum',

        'name_fathter',
        'crad_father',
        'profession_fathter',
        'religion_fathter',
        'study_fathter',
        'tel_fathter',
        'address',
        'zipcod',
    ];
    protected $primaryKey = 'id_mum';
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
    public function kids()
    {
        return $this->hasMany('App\Models\Kid');
    }

    /**
    * Get the  - that owns the -.
    */
    public function vaccines()
    {
        return $this->hasMany('App\Models\Vaccine');
    }
}
