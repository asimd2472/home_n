<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;
    protected $table = 'nurses';

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'nurse_category',
            'nurse_id',
            'category_id'
        );
    }

    public function areas()
    {
        return $this->belongsToMany(
            Arealocation::class,
            'nurse_area',
            'nurse_id',
            'area_id'
        );
    }
}
