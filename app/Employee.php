<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'image',
        'phone',
        'email',
    ];


    public function getImageAttribute($image)
    {
        return is_null($image) ? null : asset('8plus/public/'.$image);
    }
}
