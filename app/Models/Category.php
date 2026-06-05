<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'image_icon',
        'status',
    ];

    public function nurses()
    {
        return $this->belongsToMany(
            Nurse::class,
            'category_nurse',
            'category_id',
            'nurse_id'
        );
    }
}
