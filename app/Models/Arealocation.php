<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arealocation extends Model
{
    protected $fillable = [
        'area_name',
        'zone',
        'image',
        'latitude',
        'longitude',
        'slug',
    ];

    public function nurses()
    {
        return $this->belongsToMany(
            Nurse::class,
            'nurse_area',
            'area_id',
            'nurse_id'
        );
    }
}
